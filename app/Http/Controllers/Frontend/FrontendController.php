<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\Service_Category;

class FrontendController extends Controller
{
    function site_logo(){

        $site_logo= Service::where('site_logo')->latest()->get();
        return view('layouts.app', compact('site_logo'));

    }

    public function category($cat_slug){
        $services = Service_Category::where('cat_slug',$cat_slug)->get();
        return view('category', compact('services'));
    }

    function single($s_slug){

        $service = Service::where('s_slug', $s_slug)->get();
        return view('single', compact('service'));
    }

    function services($id){
        
        $services = Service::where('user_id', $id)->get();
        return view('services', compact('services'));
    }
}
