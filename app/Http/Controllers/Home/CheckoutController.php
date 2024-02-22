<?php

namespace App\Http\Controllers\Home;

use App\Helpers\SendWa;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Service\CouponService;
use App\Service\ProductService;
use App\Service\RajaOngkirService;
use App\Service\TransactionService;
use App\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Service\CompanyProfileService;


class CheckoutController extends Controller
{
    protected $rajaOngkirService;
    protected $transactionService;
    protected $productService;
    protected $userService;
    protected $couponService;
    protected $companyProfile;


    public function __construct(
        RajaOngkirService $rajaOngkirService,
        TransactionService $transactionService,
        UserService $userService,
        ProductService $productService,
        CouponService $couponService,
        CompanyProfileService $companyProfile
        )
    {
        $this->rajaOngkirService    = $rajaOngkirService;
        $this->transactionService   = $transactionService;
        $this->productService       = $productService;
        $this->userService          = $userService;
        $this->couponService        = $couponService;
        $this->companyProfile = $companyProfile;

    }

    private function getCarts()
    {
        $cart = json_decode(request()->cookie('konveksi-carts'), true);
        $cart = $cart != '' ? $cart:[];
        return $cart;
    }

    public function index()
    {
        if (Auth::check()) {
            $cart = $this->getCarts();
            $subtotal = collect($cart)->sum(function($q){
                return $q['qty'] * $q['price'];
            });
            $weight_total = collect($cart)->sum(function($q){
                return $q['qty'] * $q['weight'];
            });
            $provinsi = $this->rajaOngkirService->getProvince();
            $breadcrumb = 'Checkout';
            $company = $this->companyProfile->getAll();
            return view('home.pages.checkout.data',compact('cart', 'subtotal', 'weight_total','provinsi','breadcrumb', 'company'));
        } else {
            return redirect()->back()->with('error','Login dahulu');
        }

        // $cart = $this->getCarts();
        // $subtotal = collect($cart)->sum(function($q){
        //     return $q['qty'] * $q['price'];
        // });
        // $weight_total = collect($cart)->sum(function($q){
        //     return $q['qty'] * $q['weight'];
        // });
        // $provinsi = $this->rajaOngkirService->getProvince();
        // return view('home.pages.checkout.data',compact('cart', 'subtotal', 'weight_total','provinsi'));
    }

    public function process(Request $request)
    {
        // dd($request->all());
        $cart = $this->getCarts();
        $subtotal = collect($cart)->sum(function ($q)
            {
                return $q['qty'] * $q['price'];
            });
        $check_user          = $this->userService->getById(Auth::user()->id);
        $check_coupon_repeat = $this->couponService->getByCode($request->code);
        $check_transaction_with_coupon = $this->transactionService->getMyTransaction($check_user->id);

        // validasi total transaksi 0 atau minus
        if ($request->transaction_total <= 0) {
            return redirect()->route('checkout.index')->with('error', 'Transaksi tidak boleh 0');
        }

        // check copuon sudah digunakan berulang
        foreach($check_transaction_with_coupon as $transaction)
        {
            if ($check_coupon_repeat->coupon_repeat == 0 && $transaction->coupon_id == $check_coupon_repeat->id) {
                return redirect()->route('checkout.index')->with('error', 'Maaf kode kupon sudah digunakan ditransaksi Anda yang lain');
            }
        }

        try {
            if ($check_user->province_id == 0 && $check_user->city_id == 0 && $check_user->subdisctrict_id == 0 && $check_user->postcode == 0 && $check_user->phone == 0) {
                return redirect()->route('checkout.index')->with('error', 'Silahkan lengkapi profile anda dahulu');
            }else{
                $trx = $this->transactionService->save($request);
                $snap = $trx->payment_token;

                foreach ($cart as $item) {
                    $product = Product::with(['productImages'])->find($item['product_id']);
                    $this->productService->updateStock($item['qty'],$product->id);
                    TransactionDetail::create([
                        'transaction_id' => $trx->id,
                        'qty' => $item['qty'],
                        'product_id' => $item['product_id'],
                        'transaction_subtotal' => $item['qty'] * $product->price,
                    ]);
                }
                if ($request->idcoupon) {
                    $updateCoupon = Coupon::where('id',$request->idcoupon)->first();
                    $updateCoupon->update(['counter' => $updateCoupon->counter + 1]);
                    // $updateCoupon->increment('counter');
                }
                //
                // SendWa::sendNotifAdmin($trx->code,$trx->transaction_total,$trx->transaction_status);
                $cart = [];
                $cookie = cookie('konveksi-carts',json_encode($cart),2880);
                // $response = view('home.pages.checkout.success',compact('snap'));
                // $response = cookie($cookie);
                return redirect($trx->payment_url)->cookie($cookie);
            }
        } catch (\Throwable $th) {
            throw $th;
        }

        // return redirect()->back()->cookie($cookie)->with('snap', $snap);
        // return redirect()->route('member.detail.transaction', $trx->code)->cookie($cookie);
        // return view('home.checkout.success',compact('snap'))->cookie($cookie);
        // return $response;
        // redirect()->route('member.detail.transaction', $trx->code)->cookie($cookie);
    }

    public function postCallback(Request $request)
    {
        //  return $request;
        $get_json   = json_decode($request->get('json'));
        // return $get_json;
        if (isset($get_json->order_id)) {
            $update_order               = Transaction::where('code',$get_json->order_id)->first();
            $update_order->payment_type = $get_json->payment_type;
            if ($get_json->payment_type == "echannel") {
                $update_order->bank_name      = 'mandiri';
                $update_order->va_number      = $get_json->bill_key;
                $update_order->bill_code      = $get_json->biller_code;
            }elseif($get_json->payment_type == "qris"){
                $update_order->bank_name      = 'qris';
                $update_order->payment_type      = 'qris';
            }else{
                foreach ($get_json->va_numbers as $card) {
                    $update_order->bank_name      = $card->bank ?? '';
                    $update_order->va_number      = $card->va_number ?? '';
                }
            }
            $update_order->save();
            return redirect()->route('member.dashboard')->with('success','Transaksi berhasil dibayar');
        }
        return redirect()->route('member.dashboard');
    }
}
