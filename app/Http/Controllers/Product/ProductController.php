<?php

namespace App\Http\Controllers\Product;

use Symfony\Component\HttpFoundation\Session\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{

    function get_product($cat_id){
        $product = Product::where('cat_slug', $cat_id)->get();
        return view('category', compact('product'));
    }

    function add_to_cart(Request $request, $id){


    }
}
