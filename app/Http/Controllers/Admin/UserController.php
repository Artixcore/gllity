<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Gate;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::paginate();
        return view('admin.dashboard.admin');
        // ->with('users', $users);
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

        return redirect()->route('superadmin.users.index');
    }

}
