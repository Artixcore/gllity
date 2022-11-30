<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Employee;
use App\User;
use Image;

class EmployeeController extends Controller
{
    function employee(){

        // $employees = User::paginate(5);
        $employees = User::where('user_id', auth()->id())->get();
        return view('admin.employee.employee', compact('employees'));
    }

    function addemployee(Request $request){


        if($request->hasFile('avatar')){
        $avatar =   $request->file('avatar');
        $filenames = time() . '.' .$avatar->getClientOriginalExtension();
        Image::make($avatar)->save( public_path('/admin/images/employee/'. $filenames) );
        $cat = Auth::user();
        $cat->avatar = $filenames;
        // $cat->save();
    }

    $cat = new User();

        $cat->name      = $request->name;
        $cat->email     = $request->email;
        $cat->urole     = $request->urole;
        $cat->password  = Hash::make('password');
        $cat->avatar    = $filenames;
        $request->user()->employee()->save($cat);
        // $request->employee()->user()->save($cat);
        // $request->user()->service()->save($cat);
        // $request-> save();

    return back();
    }
}
