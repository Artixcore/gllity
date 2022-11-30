<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Service_Category;
use Carbon\Carbon;
use App\Location;
use App\Category;
use App\Company;
use App\Shop;
use App\User;
use App\Role;
use Image;
use Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function superadmin()
    {
        return view('superadmin.dashboard.admin');
    }

    function admin_dash(){

        return view('superadmin.dashboard.admin');
    }

    function company(){
        $company = Shop::paginate(10);
        return view('superadmin.company.company', compact('company'));
    }


    function del_company($id){

        User::findOrFail($id)->delete();

        return back()->with('delete','delete successfull!!');
    }


    function locations(){
        $location = Location::paginate(5);
        return view('superadmin.location.location', compact('location'));
    }

        // Location
        function add_location(Request $request){
            Location::insert([
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
                'created_at' => Carbon::now()
            ]);
            return back()->with('message','Insert Successfully');
        }

        function get_edit($id){
            $location = Location::findOrFail($id)->get();
            return view('superadmin.location.edit', compact('location'));
        }

        function edit_location(Request $request, $id){

            $cat = Location::find($id);

            $cat->city = $request['city'];
            $cat->state = $request['state'];
            $cat->country = $request['country'];
            $cat->save();

            return redirect()->back();
            }

            function delete_location($id){

                Location::findOrFail($id)->delete();
                return back()->with('delete','delete successfull!!');
            }

            function view(){
                $category = Service_Category::paginate();
                return view('superadmin.categories.categories', compact('category'));
            }

            function addcat(Request $request){

                if($request->hasFile('cat_image')){
                $cat_image =   $request->file('cat_image');
                $filenames = time() . '.' .$cat_image->getClientOriginalExtension();
                Image::make($cat_image)->save( public_path('/admin/images/category/'. $filenames) );
                $cat = Auth::user();
                $cat->cat_image = $filenames;
                // $cat->save();
            }

            $cat =new Service_Category();

                $cat->cat_name   = $request->cat_name;
                $cat->cat_slug   = $request->cat_slug;
                $cat->cat_image  = $filenames;
                $cat->save();

            return back();
            }

            function cat_del($id){
                Service_Category::find($id)->delete();
                return back();
            }

            function edit_cate($cat_slug){
                $category = Service_Category::where('cat_slug', $cat_slug)->get();
                return view('superadmin.categories.edit', compact('category'));
            }

             function edit_update(Request $request,$id){

                if($request->hasFile('cat_image')){
                    $cat_image =   $request->file('cat_image');
                    $filename = time() . '.' .$cat_image->getClientOriginalExtension();
                    Image::make($cat_image)->save( public_path('/admin/images/category/'. $filename) );
                    $cat = Auth::user();
                    $cat->cat_image = $filename;
                    // $cat->save();
                }


                $cat = Service_Category::find($id);
                if($cat){
                $cat->cat_name = $request['cat_name'];
                $cat->cat_slug = $request['cat_slug'];
                $cat->cat_image = $filename;
                $cat->save();
                } else {
                return redirect()->back();
                }
                return redirect()->back();

            }

            function postcompany(Request $request){


                if($request->hasFile('avatar')){
                    $avatar =   $request->file('avatar');
                    $filenames = time() . '.' .$avatar->getClientOriginalExtension();
                    Image::make($avatar)->save( public_path('/admin/images/company/'. $filenames) );
                    $cat = Auth::user();
                    $cat->avatar = $filenames;
                    // $cat->save();
                }

                $cat =new User();

                    $cat->name   = $request->name;
                    $cat->b_name = $request->b_name;
                    $cat->email = $request->email;
                    $cat->b_website = $request->b_website;
                    $cat->phone = $request->phone;
                    $cat->location = $request->location;
                    $cat->address = $request->address;
                    $cat->password  =  Hash::make('password');
                    $cat->urole = $request->urole;
                    $cat->avatar  = $filenames;
                    $cat->save();

                return back();
            }

            // public function index()
            // {
            //     $users = User::paginate();
            //     return view('superadmin.users.index', compact('users'));
            // }

            public function index()
    {
        // $users = User::paginate();
        return view('superadmin.dashboard.admin');
        // ->with('users', $users);
    }

    function roles(){

        $users = User::paginate(10);
        return view('superadmin.users.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // if(Gate::denies('edit-users')){
        //     return redirect()->route('admin.users.index');
        // }
        if(Gate::denies('manage-users')){
            return redirect()->route('superadmin.users.index');
        }
        $roles = Role::all();
        return view('superadmin.users.edit')->with([
            'user'  => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
       $user->roles()->sync($request->roles);
       $user->name    = $request->name;
       $user->email   = $request->email;
    //    $user->password   = $request->password;
       if($user->save()){
        $request->session()->flash('success', 'Successful Updated');
       }else{
        $request->session()->flash('error', 'Invalied');
       }

       return redirect()->route('superadmin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(Gate::denies('edit-delete')){
            return redirect()->route('superadmin.users.index');
        }
        $user->roles()->detach();
        $user->Delete();

        return view('superadmin.users.index');
    }
}
