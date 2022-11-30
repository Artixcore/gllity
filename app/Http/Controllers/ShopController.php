<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Shop;
use App\User;
use Image;

class ShopController extends Controller
{
    function index(){

        return view('fontend.newshop');
    }

    function new_shop(Request $request ){

        if($request->hasFile('company_logo')){
            $company_logo =   $request->file('company_logo');
            $com_logo = time() . '.' .$company_logo->getClientOriginalExtension();
            Image::make($company_logo)->save( public_path('/superadmin/images/shop/'. $com_logo) );
            $cat = Auth::user();
            $cat->company_logo = $com_logo;
        }


        $cat = new User();

            $cat->user_number = Auth::user()->id.uniqid();
            $cat->name = $request->name;
            $cat->email = $request->email;
            $cat->urole = "admin";
            $cat->location = $request->location; 
            $cat->company_name = $request->company_name;
            $cat->company_logo = $com_logo;
            $cat->password = Hash::make('password');
            $cat->save();

            return back();

    }


    function editshop($company_name){
        $company = User::where('company_name', $company_name)->get();
        return view('superadmin.company.edit', compact('company'));
    }

    function single_post($post_id){

        $posts = Post::where('post_id', $post_id)->get();
        return view('frontend.single', compact('posts'));
    }

    function updateshop(Request $request, $id){

        if($request->hasFile('company_logo')){
            $company_logo =   $request->file('company_logo');
            $com_logo = time() . '.' .$company_logo->getClientOriginalExtension();
            Image::make($company_logo)->save( public_path('/superadmin/images/shop/'. $com_logo) );
            $cat = Auth::user();
            $cat->company_logo = $com_logo;
        }

        $cat = User::find($id);
       
            $cat->user_number = Auth::user()->id.uniqid();
            $cat->name = $request->name;
            $cat->email = $request->email;
            $cat->urole = "admin";
            $cat->location = $request->location; 
            $cat->company_name = $request->company_name;
            $cat->company_logo = $com_logo;
            $cat->password = Hash::make('password');
            $cat->save();
 
        return redirect()->back();

    }

    function all_companies(){

        $shop = Shop::all();
        return view('companies', compact('shop'));
    }


}
