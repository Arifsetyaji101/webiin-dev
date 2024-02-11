<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Service\CategoryService;
use App\Service\CompanyProfileService;
use App\Service\ProductService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Helpers\CartCookie;
use App\Models\Product;
use Illuminate\Support\Str;

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

    public function index(Request $request, Product $prod): View
    {
        $cartHelper = new CartCookie();
        $product = $this->productService->getAll();
        // dd($product);
        $category = $this->categoryService->getCategoryProduct();
        $company = $this->comproService->getAll();
        $cart = $cartHelper->getCarts();
        $count_cart = $cartHelper->getTotalCart();
        $subtotal = collect($cart)->sum(function($q){
            return $q['qty'] * $q['price'];
        });
        $breadcrumb = 'Template';
        $prod = $prod->newQuery()->where('category_id','!=',1000)->orderBy('created_at', 'DESC');
        if ($request->has('search')) {
            $prod->where('title', 'like', '%'.$request->input('search').'%');
            // $prod->whereRaw('MATCH(title, slug, description) AGAINST (? IN NATURAL LANGUAGE MODE)',[$request->input('search')]);
        }
        $product=$prod->paginate(12);

        // if ($search = $request->query('search')) {
        //     $search =  str_replace('-',' ',Str::slug($search));
        //     $product = Product::whereRaw('MATCH(title, slug, description) AGAINST (? IN NATURAL LANGUAGE MODE)',[$search]);
        //     dd($product);

        //     // var_dump($slug);exit;
        // }
        return view('home.pages.shop.index',compact('product','category','company','cart','subtotal','breadcrumb','count_cart'));
    }

    public function productDetailSlug($slug)
    {
        $detail         = $this->productService->getBySlug($slug);
        $category       = $detail->category_id;
        $cartHelper     = new CartCookie();
        $cart           = $cartHelper->getCarts();
        $count_cart     = $cartHelper->getTotalCart();
        $subtotal = collect($cart)->sum(function($q){
            return $q['qty'] * $q['price'];
        });
        $relateProduct = $this->productService->relatedProduct($category);
        $breadcrumb = 'Detail Template';
        return view('home.pages.shop.product-details',compact('detail','cart','subtotal','relateProduct','breadcrumb','count_cart'));
    }

    public function quickViewModal($slug)
    {
        $detail = $this->productService->getBySlug($slug);
        return view('home.pages.shop.modal.quick-view',compact('detail'));
    }

    public function sortProduct(Request $request,Product $prod)
    {
        $prod = $prod->newQuery()->where('category_id','!=',1000);
        if ($request->has('search')) {
            $prod->where('title', 'like', '%'.$request->input('search').'%');
            // $prod->whereRaw('MATCH(title, slug, description) AGAINST (? IN NATURAL LANGUAGE MODE)',[$request->input('search')]);
        }
    }

    public function categoryWithProduct(Request $request, $slug,Product $prod)
    {
        $cartHelper = new CartCookie();
        $product = $this->categoryService->getProductByCategory($slug);
        $breadcrumb = 'Category';
        // $prod = $prod->newQuery()->where('category_id','!=',1000)->orderBy('created_at', 'DESC');
        // if ($request->has('search')) {
        //     $prod->where('title', 'like', '%'.$request->input('search').'%');
        //     // $prod->whereRaw('MATCH(title, slug, description) AGAINST (? IN NATURAL LANGUAGE MODE)',[$request->input('search')]);
        // }
        // $product=$prod->paginate(12);

        $company = $this->comproService->getAll();
        $cart = $cartHelper->getCarts();
        $count_cart = $cartHelper->getTotalCart();
        $subtotal = collect($cart)->sum(function($q){
            return $q['qty'] * $q['price'];
        });
        $category = $this->categoryService->getCategoryProduct();
        // dd($product);
        return view('home.pages.shop.category-product',compact('cart','product','company','subtotal','count_cart','breadcrumb','category'));
    }
}
