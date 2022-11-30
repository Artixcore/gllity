<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    function superadminsettings(){

        return view('superadmin.settings.service');
    }
}
