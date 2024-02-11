<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Service\ArticleService;
use App\Service\BannerService;
use App\Service\CategoryService;
use App\Service\CompanyProfileService;
use App\Service\RajaOngkirService;
use Illuminate\Http\Request;
use Iodev\Whois\Factory;
use App\Helpers\CartCookie;
use App\Service\ProductService;

class HomeController extends Controller
{
    protected $bannerService;
    protected $rajaOngkirService;
    protected $companyProfile;
    protected $articleService;
    protected $categoryService;
    protected $productService;

    public function __construct(
        BannerService $bannerService,
        RajaOngkirService $rajaOngkirService,
        CompanyProfileService $companyProfile,
        ArticleService $articleService,
        CategoryService $categoryService,
        ProductService $productService
    )
    {
        $this->bannerService = $bannerService;
        $this->rajaOngkirService = $rajaOngkirService;
        $this->companyProfile = $companyProfile;
        $this->articleService = $articleService;
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }

    private function getCarts()
    {
        $cart = json_decode(request()->cookie('konveksi-carts'), true);
        $cart = $cart != '' ? $cart : [];
        return $cart;
    }

    public function index()
    {
        // $cart = $this->getCarts();
        $cartHelper = new CartCookie();
        $cart = $cartHelper->getCarts();
        $count_cart = $cartHelper->getTotalCart();
        $subtotal = collect($cart)->sum(function ($q) {
            return $q['qty'] * $q['price'];
        });
        $banner  = $this->bannerService->getAll();
        // dd($banner);
        $company = $this->companyProfile->getAll();
        $popular_product = $this->productService->popularProductHome();
        $article = $this->articleService->articlePublish();
        return view('home.homefront', compact('banner', 'cart', 'subtotal','company','article','count_cart','popular_product'));
    }

    public function getCity($id)
    {
        return $this->rajaOngkirService->getCity($id);
    }

    public function getSubdistrict($id)
    {
        return $this->rajaOngkirService->getSubdistrict($id);
    }

    public function register()
    {
        $cartHelper = new CartCookie();
        $cart = $cartHelper->getCarts();
        $count_cart = $cartHelper->getTotalCart();
        $subtotal = collect($cart)->sum(function ($q) {
            return $q['qty'] * $q['price'];
        });
        $company = $this->companyProfile->getAll();
        $provinsi = $this->rajaOngkirService->getProvince();
        $breadcrumb = 'Register';
        return view('home.pages.register',compact('provinsi','cart','subtotal','company','breadcrumb','count_cart'));
    }

    public function loginUser()
    {
        $cartHelper     = new CartCookie();
        $cart           = $cartHelper->getCarts();
        $count_cart     = $cartHelper->getTotalCart();
        $subtotal       = collect($cart)->sum(function ($q) {
            return $q['qty'] * $q['price'];
        });
        $company = $this->companyProfile->getAll();
        $breadcrumb = 'Login';
        return view('home.pages.login',compact('company','subtotal','cart','breadcrumb','count_cart'));
    }

    public function about()
    {
        $cartHelper     = new CartCookie();
        $cart           = $cartHelper->getCarts();
        $count_cart     = $cartHelper->getTotalCart();
        $subtotal = collect($cart)->sum(function ($q) {
            return $q['qty'] * $q['price'];
        });
        $company = $this->companyProfile->getAll();
        $breadcrumb = 'Tentang Kami';
        return view('home.pages.about.index',compact('company','cart','subtotal','breadcrumb','count_cart'));
    }

    public function cekDomain(Request $request)
    {
        $domain         = $request->domain;
        $ekstensi       = $request->ekstensi;
        $combinedInput  = $domain.$ekstensi;
        // print $combinedInput;
        $whois = Factory::get()->createWhois();
        // // Checking availability
        if ($whois->isDomainAvailable($combinedInput)) {
            $arr = [
                'domain' => $combinedInput,
                'tersedia' => 'ya',
                'result' => 'Selamat domain '.$combinedInput.' masih tersedia'
            ];
            return json_encode($arr);
        }else{
            $arr = [
                'domain' => $combinedInput,
                'tersedia' => 'tidak',
                'result' => 'Maaf domain '.$combinedInput.' tidak tersedia'
            ];
            return json_encode($arr);
        }
    }

    public function addDomainCookie(Request $request)
    {
        $cartHelper = new CartCookie();
        $cart = $cartHelper->getCarts();

        // dd($request->all());
        $newProductDomain = $this->productService->addDomainCheckout($request);
        if ($cart && array_key_exists($request->id, $cart)) {
            $cart[$request->id]['qty'] += $request->qty;
        }elseif($newProductDomain){
            $cart [$newProductDomain->id] = [
                'qty' => $request->qty,
                'product_id' => $newProductDomain->id,
                'category_id' => $newProductDomain->category_id,
                'title' => $request->title_domain,
                'price' => 0,
                'weight' => 1,
                'image' => url('themes-frontend/img/domain_webiin.png'),
                'coupon' => 0,
                'coupon_rate' => 0,
                'type_coupon' => '',
                'domain'      => 1,
            ];
        }else{
            $cart [] = [
                'qty' => $request->qty,
                'product_id' => $newProductDomain->id,
                'category_id' => $newProductDomain->category_id,
                'title' => $request->title_domain,
                'price' => 0,
                'weight' => 1,
                'image' => url('themes-frontend/img/domain_webiin.png'),
                'coupon' => 0,
                'coupon_rate' => 0,
                'type_coupon' => '',
                'domain'      => 1,
            ];
        }

        $cookie = cookie('konveksi-carts',json_encode($cart),2880);
        // return $cart;

        // return view('home.pages.cart.modal.add-to-cart',compact('cart'));
        return redirect()->route('cart.index')->cookie($cookie);

        // $domain = $request->domain;
        // $carts[] =
        // [
        //     'domain' => $domain,
        // ];
        // $cookie = cookie('konveksi-carts', json_encode($carts), 2880);
        // // return cookie($cookie);
        // return redirect()->back()->cookie($cookie);
    }

    public function detailBlog($slug)
    {
        $cartHelper     = new CartCookie();
        $cart           = $cartHelper->getCarts();
        $count_cart     = $cartHelper->getTotalCart();
        $subtotal = collect($cart)->sum(function ($q) {
            return $q['qty'] * $q['price'];
        });
        $detailBlog = $this->articleService->getBySlug($slug);
        // dd($detailBlog);
        $viewUpdate = $this->articleService->getBySlug($slug)->increment('view');
        $popularView = $this->articleService->popularByView();
        $tags       = explode(',', $detailBlog->tags);
        $category   = $this->categoryService->getCategoryArticle();
        $related    = $this->articleService->relatedPost($detailBlog->category_id);
        $breadcrumb = 'Detail Blog';
        // dd($tags);
        return view('home.pages.blog.details',compact('detailBlog','cart','subtotal','category','related','breadcrumb','count_cart','tags','popularView'));
    }

    public function pageError()
    {
        $cartHelper     = new CartCookie();
        $cart           = $cartHelper->getCarts();
        $count_cart     = $cartHelper->getTotalCart();
        $subtotal = collect($cart)->sum(function ($q) {
            return $q['qty'] * $q['price'];
        });
        $breadcrumb = '404';
        return view('home.pages.404',compact('cart','breadcrumb','count_cart','subtotal'));
    }
}
