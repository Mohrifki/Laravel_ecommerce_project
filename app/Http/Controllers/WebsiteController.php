<?php

namespace App\Http\Controllers;

use App\Models\MainCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('website.ecommerce.index');
    }

    public function products()
    {
        return view('website.ecommerce.products');
    }
    
    public function get_min_max_price_json()
    {
        $max_price = Product::orderBy('price', 'DESC')->first();
        $min_price = Product::orderBy('price', 'ASC')->first();

        return response()->json([
            'max_price' => $max_price->price,
            'min_price' => $min_price->price,
        ]);
    }

    public function get_all_category_json()
    {
        $category = MainCategory::where('status', 1)->with('related_categories')->withCount('related_products')->get();
        return $category;
    }

    public function details(Product $product)
    {
        $product['discount_price'] = HelperController::discount_price($product->price, $product->discount, $product->expiration_date);
        $product['image'] = $product->image()->get();
        $product['category'] = $product->category()->get();
        $product['sub_category'] = $product->sub_category()->get();
        $product['main_category'] = $product->main_category()->get();
        $product['color'] = $product->color()->get();
        $product['publication'] = $product->publication()->get();
        $product['size'] = $product->size()->get();
        $product['unit'] = $product->unit()->get();
        $product['vendor'] = $product->vendor()->get();
        $product['writer'] = $product->writer()->get();

        return view('website.ecommerce.product_details', compact('product'));
    }

    public function cart()
    {
        return view('website.ecommerce.cart');
    }

    public function checkout()
    {
        return view('website.ecommerce.checkout');
    }

    public function wishlist()
    {
        return view('website.ecommerce.wishlist');
    }

    public function contact()
    {
        return view('website.ecommerce.contact');
    }

    public function vue()
    {
        return view('learn-vue');
    }

    public function latest_product_json(Request $request)
    {
        $collection = Product::active()
            ->with([
                'category',
                'sub_category',
                'main_category',
                'color', 'image',
                'publication',
                'size', 'unit',
                'vendor',
                'writer',
            ])
            ->orderBy('id', 'DESC')->paginate(8);
        return $collection;
    }

    public function search_product_json(Request $request, $limit, $key)
    {
        $collection = Product::active()
            ->where('name', $key)
            ->orWhere('code', $key)
            ->orWhere('price', $key)
            ->orWhere('discount', $key)
            ->orWhere('name','LIKE','%' . $key . '%')
            ->with(['category', 'sub_category', 'main_category', 'color', 'image', 'publication', 'size', 'unit', 'vendor', 'writer'])
            ->orderBy('id', 'DESC')->paginate($limit);
        return $collection;
    }

    public function show_product_json(Product $product)
    {
        $product['discount_price'] = HelperController::discount_price($product->price, $product->discount, $product->expiration_date);
        $product['image'] = $product->image()->get();
        $product['category'] = $product->category()->get();
        $product['sub_category'] = $product->sub_category()->get();
        $product['main_category'] = $product->main_category()->get();
        $product['color'] = $product->color()->get();
        $product['publication'] = $product->publication()->get();
        $product['size'] = $product->size()->get();
        $product['unit'] = $product->unit()->get();
        $product['vendor'] = $product->vendor()->get();
        $product['writer'] = $product->writer()->get();

        // echo $product->discount_price;
        return $product;
    }

    public function get_product_related_info_json($product)
    {
        $product = Product::where('id', $product)->select('id', 'price', 'discount', 'expiration_date')->first();
        $product['discount_price'] = HelperController::discount_price($product->price, $product->discount, $product->expiration_date);

        return $product;
    }
}
