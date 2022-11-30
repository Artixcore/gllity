<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Product;
use App\Service;
use App\Slide;
use Image;


class ProductController extends Controller
{
    function viewproducts(){
        $product = Product::where('user_id', auth()->id())->get()->paginate(10);
        return view('admin.products.product', compact('product'));
    }

    function addproduct(Request $request){

        if($request->hasFile('p_image')){
            $p_image =   $request->file('p_image');
            $filenames = time() . '.' .$p_image->getClientOriginalExtension();
            Image::make($p_image)->save( public_path('/admin/images/product/'. $filenames) );
            $cat = Auth::user();
            $cat->p_image = $filenames;
            // $cat->save();
        }

        $cat = new Product();

            $cat->p_name   = $request->p_name;
            $cat->p_desc   = $request->p_desc;
            $cat->p_price  = $request->p_price;
            $cat->p_location  = $request->p_location;
            $cat->p_discount  = $request->p_discount;
            $cat->p_employee  = $request->p_employee;
            $cat->p_image  = $filenames;
            $request->user()->product()->save($cat);
            // $cat->save();

        return back();

    }

    function updateproduct(Request $request,$id){

        if($request->hasFile('p_image')){
            $p_image =   $request->file('p_image');
            $filenames = time() . '.' .$p_image->getClientOriginalExtension();
            Image::make($p_image)->save( public_path('/admin/images/product/'. $filenames) );
            $cat = Auth::user();
            $cat->p_image = $filenames;
            // $cat->save();
        }


        $cat = Product::find($id);
        if($cat){
            $cat->p_name   = $request->p_name;
            $cat->p_desc   = $request->p_desc;
            $cat->p_price  = $request->p_price;
            $cat->p_discount  = $request->p_discount;
            // $cat->s_employee  = $request->s_employee;
            $cat->p_image  = $filenames;
        $cat->save();

        } else {
        return redirect()->back();
        }

        return redirect()->back();

    }


    function pos_view(){

        $services = Service::where('user_id', auth()->id())->get();
        // return dd($services);
        return view('admin.pos.pos', compact('services'));

    }


}
