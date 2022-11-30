<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Image;

class UserController extends Controller
{


    public function profile($name)
    {
        $user = User::where('name', $name)->get();
        return view('frontend.profile', compact('user'));
    }

    function update_avatar(Request $request){
        // User Upload Avatar
        if($request->hasFile('avatar')){
            $avatar =   $request->file('avatar');
            $filename = time() . '.' .$avatar->getClientOriginalExtension();
            Image::make($avatar)->save( public_path('/user/'. $filename) );
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return back();
    }



    function update_cover(Request $request){
        // User Upload Cover
        if($request->hasFile('cover')){
            $cover =   $request->file('cover');
            $filename = time() . '.' .$cover->getClientOriginalExtension();
            Image::make($cover)->save( public_path('/user/'. $filename) );
            $user = Auth::user();
            $user->cover = $filename;
            $user->save();
        }
        return back();
    }

    function edit($name){
        $user = User::where('name', $name)->get();
        return view('fontend.settings.general', compact('user'));
    }

    function save_general(Request $request, $id){

        $user = User::find($id);
        if($id){

            $user->name = $request->name;
            $user->f_name = $request->f_name;
            $user->l_name = $request->l_name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->save();

            return back();

        }else{
        return back();
        }
        return back();
    }

    function security($name){
        $user = User::where('name', $name)->get();
        return view('fontend.settings.security', compact('user'));
    }

    public function ChangePassword(Request $request) {
        $this->validate($request, [
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->getAuthPassword();

        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();

            Auth::logout();
            return redirect(route('login'))->with('successMsg', 'Password has been changed successfully');
        }else {
            return back()->with('errorMsg', 'Current Password is invalid');
        }
    }

    function status(Request $request){
        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success' => 'Status Successfully Update']);
    }


    function device(){
        // $user = User::where('name', $name)->get();
        User::find()->authentications;

        $p  = auth()->user()->previousLoginAt();

        $pi = auth()->user()->previousLoginIp();


        return view('frontend.settings.device', compact('p'));
        // return view('frontend.settings.device', compact('user'));
    }
}
