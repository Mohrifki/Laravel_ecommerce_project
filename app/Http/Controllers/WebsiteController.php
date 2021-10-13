<?php

namespace App\Http\Controllers;

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

    public function details()
    {
        return view('website.ecommerce.product_details');
    }
}
