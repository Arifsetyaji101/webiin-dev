<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Service\CouponService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use App\Helpers\CartCookie;

class CartController extends Controller
{
    protected $getCoupon;

    public function __construct(CouponService $getCoupon)
    {
        $this->getCoupon = $getCoupon;
    }

    public function index()
    {
        // $cart = $this->getCarts();
        $cartHelper = new CartCookie();
        $cart = $cartHelper->getCarts();
        $subtotal = collect($cart)->sum(function($q){
            return $q['qty'] * $q['price'];
        });
        $breadcrumb = 'Keranjang';
        $count_cart = $cartHelper->getTotalCart();
        return view('home.pages.cart.index',compact('cart', 'subtotal','breadcrumb','count_cart'));
    }

    public function addToCart(Request $request)
    {

        $cartHelper = new CartCookie();
        $cart = $cartHelper->getCarts();
        // $cart = $this->getCarts();
        if ($cart && array_key_exists($request->id, $cart)) {
            $cart[$request->id]['qty'] += $request->qty;
        }else{
            $product = Product::with(['productImages'])->find($request->id);
            $cart [$request->id] = [
                'qty' => $request->qty,
                'product_id' => $product->id,
                'category_id' => $product->category_id,
                'title' => $product->title,
                'price' => $product->price,
                'weight' => $product->weight,
                'image' => $product->productImages->first()->image,
                'coupon' => 0,
                'coupon_rate' => 0,
                'type_coupon' => '',
                'domain'      => '',
            ];
        }
        $cookie = cookie('konveksi-carts',json_encode($cart),2880);
        // return $cart;

        // return view('home.pages.cart.modal.add-to-cart',compact('cart'));
        return redirect()->route('cart.index')->cookie($cookie);
        // return redirect()->back()->with(['success' => 'Produk ditambahkan ke keranjang'])->cookie($cookie);

    }

    public function applyCoupon(Request $request)
    {
        $code   = $request->code;
        // $cart   = $this->getCarts();
        $cartHelper = new CartCookie();
        $cart = $cartHelper->getCarts();
        $coupon = $this->getCoupon->getByCode($code);
        $subtotal = collect($cart)->sum(function($q) use ($coupon) {
            return ($q['qty'] * $q['price']);
        });
        $today  = Carbon::now()->format('Y-m-d');
        if ($today > $coupon->end_date) {
            // return print('kupon tidak berlaku');
                $arr[] = array(
                    'result_total' => 0,
                    'rate'  => 0,
                    'type'  => 'expired',
                    'idcoupon' => 0,
                );
        }else{
            if ($coupon->type == 'numeric') {
                $reesult_coupon = $subtotal - $coupon->discount_rate;
            }
            if ($coupon->type == 'percentage') {
                $percent        = $coupon->discount_rate / 100 * $subtotal;
                $reesult_coupon = $subtotal - $percent;
            }
            $arr[] = array(
                'result_total'  => $reesult_coupon,
                'rate'          => $coupon->discount_rate,
                'type'          => $coupon->type,
                'idcoupon'      => $coupon->id,
                'description'   => $coupon->description,
            );
        }

        // if ($reesult_coupon) {
        //     $cookies = json_decode(request()->cookie('konveksi-carts'), true);
        //     foreach ($arr as $key => $value) {
        //         $cookies['coupon']=$value['rate'];
        //         $cookies['coupon_rate']=$value['result_total'];
        //         $cookies['type_coupon']=$value['type'];
        //     }
        //     // $cart[]= [
        //     //     'result_coupon' => $reesult_coupon
        //     // ];
        //     cookie('konveksi-carts',json_encode($cart),2880);
        // }
        return $arr;
    }

    public function getSessionCart()
    {
        $cartHelper = new CartCookie();
        $cart = $cartHelper->getCarts();
        return $cart;
    }

    public function updateCart(Request $request)
    {
        // $cart = json_decode(request()->cookie('konveksi-carts'), true);
        $cartHelper = new CartCookie();
        $cart = $cartHelper->getCarts();
        foreach ($request->product_id as $key => $item) {
            if ($request->qty[$key] == 0) {
                unset($cart[$item]);
            }else{
                $cart[$item]['qty']=$request->qty[$key];
            }
        }

        $cookie = cookie('konveksi-carts',json_encode($cart),2880);
        return redirect()->back()->cookie($cookie);
    }

    public function deleteCart(Request $request, $id)
    {
        $cartHelper = new CartCookie();
        $cart = $cartHelper->getCarts();
        foreach ($cart as $key => $item) {
            if ($item['product_id'] == $id) {

                // unset($cart[$item]);
                unset($cart [$key]);
            }else{

            }
        }
        $cookie = cookie('konveksi-carts',json_encode($cart),2880);
        // $cookie = $request->session()->push('jitus-carts', $cart);
        return redirect()->back()->cookie($cookie);
    }
}
