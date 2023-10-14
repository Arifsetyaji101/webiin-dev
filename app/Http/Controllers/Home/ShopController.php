<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Service\CategoryService;
use App\Service\CompanyProfileService;
use App\Service\ProductService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected $productService;
    protected $categoryService;
    protected $comproService;

    public function __construct(ProductService $productService,CategoryService $categoryService,CompanyProfileService $comproService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->comproService = $comproService;
    }

    private function getCarts()
    {
        $cart = json_decode(request()->cookie('konveksi-carts'), true);
        $cart = $cart != '' ? $cart:[];
        return $cart;
    }

    public function index(): View
    {
        $product = $this->productService->getAll();
        $category = $this->categoryService->getAll();
        $company = $this->comproService->getAll();
        $cart = $this->getCarts();
        $subtotal = collect($cart)->sum(function($q){
            return $q['qty'] * $q['price'];
        });
        return view('home.pages.shop.index',compact('product','category','company','cart','subtotal'));
    }

    public function productDetailSlug($slug)
    {
        $detail = $this->productService->getBySlug($slug);
        $cart = $this->getCarts();
        $subtotal = collect($cart)->sum(function($q){
            return $q['qty'] * $q['price'];
        });
        // dd($detail);
        return view('home.pages.shop.product-details',compact('detail','cart','subtotal'));
    }
}
