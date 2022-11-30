<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';



    function redirectTo()
    {
    // if(Auth::user()->hasAnyRoles(['superadmin','admin','author'])){
    //     $this->redirectTo = route('admin.users.index');
    //     return $this->redirectTo;
    // }


    if(Auth::user()->hasRole('admin')){
        $this->redirectTo = route('admin');
        return $this->redirectTo;
    }

    elseif(Auth::user()->hasRole('superadmin')){
        $this->redirectTo = route('superadmin.dashboard');
        return $this->redirectTo;
    }

    elseif(Auth::user()->hasRole('author')){
        $this->redirectTo = route('author');
        return $this->redirectTo;
    }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


}
