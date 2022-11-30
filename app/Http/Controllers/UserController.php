<?php

namespace App\Http\Controllers;

use App\Service;
use App\Shop;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Image;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {

        return view('fontend.profile', array('user' => Auth::user()) );
    }

    function update_avatar(Request $request){
        // User Upload Avatar
        if($request->hasFile('avatar')){
            $avatar =   $request->file('avatar');
            $filename = time() . '.' .$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(250, 230)->save( public_path('/user/'. $filename) );
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return view('fontend.profile', array('user' => Auth::user()) );
    }

    function status(Request $request){
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success' => 'Status Successfully Update']);
    }

    function shop_status(Request $request){
        $user = Shop::find($request->shop_id);
        $user->shop_status = $request->shop_status;
        $user->save();

        return response()->json(['success' => 'Status Successfully Update']);
    }

    function servicestatus(Request $request){
        $user = Service::find($request->service_id);
        $user->service_status = $request->service_status;
        $user->save();

        return response()->json(['success' => 'Status Successfully Update']);
    }

}
