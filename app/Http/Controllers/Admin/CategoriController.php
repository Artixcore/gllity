<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use phpseclib\Crypt\Random;
use App\Service_Category;
use App\Category;
use App\Service;
use Image;

class CategoriController extends Controller
{

    function admin_view(){

        $service = Service::where('user_id', auth()->id())->get();
        return view('admin.services.service', compact('service'));

    }

    function admin_edit($s_name){
        $service = Service::where('s_name', $s_name)->get();
        return view('admin.services.edit', compact('service'));
    }

    function service(Request $request){

        if($request->hasFile('s_image')){
            $s_image =   $request->file('s_image');
            $filenames = time().'.'.$s_image->getClientOriginalExtension();
            Image::make($s_image)->save( public_path('/admin/images/service/'. $filenames) );
            $cat = Auth::user();
            $cat->s_image = $filenames;
        }

        $cat =new Service();

            $cat->s_id        = Auth::user()->id.rand(1,35);
            $cat->s_name      = $request->s_name;
            $cat->s_slug      = $request->s_slug;
            $cat->s_desc      = $request->s_desc;
            $cat->s_price     = $request->s_price;
            // $cat->s_discount  = $request->s_discount;
            $cat->s_location  = $request->s_location;
            $cat->s_category  = $request->s_category;
            $cat->s_timing    = $request->s_timing;
            // $cat->s_employee  = $request->s_employee;
            $cat->s_image     = $filenames;
            $request->user()->service()->save($cat);

        return back();

    }

    function update_service(Request $request, $id){

        if($request->hasFile('s_image')){
            $s_image =   $request->file('s_image');
            $filenamess = time().'.'.$s_image->getClientOriginalExtension();
            Image::make($s_image)->save( public_path('/admin/images/service/'. $filenamess) );
            $cat = Auth::user();
            $cat->s_image = $filenamess;
        }

        $cat = Service::find($id);

            $cat->s_id        = Auth::user()->id.rand(1,35);
            $cat->s_name      = $request->s_name;
            $cat->s_slug      = $request->s_slug;
            $cat->s_desc      = $request->s_desc;
            $cat->s_price     = $request->s_price;
            // $cat->s_discount  = $request->s_discount;
            $cat->s_location  = $request->s_location;
            $cat->s_category  = $request->s_category;
            $cat->s_timing    = $request->s_timing;
            // $cat->s_employee  = $request->s_employee;
            $cat->s_image     = $filenamess;
            $request->user()->service()->save($cat);

        return back();

    }

    function delete_service($id){

        Service::findOrFail($id)->delete();
        return back()->with('delete','delete successfull!!');
    }


    public function allcat(){
        // $services = Service_Category::where('cat_name',$cat_name)->get();
        return view('category');
        // return view('category', compact('services'));
    }


}
