<?php

namespace App\Http\Controllers;

use App\Thana;
use App\Zilla;
use App\User;
use Illuminate\Http\Request;

class DonerfilterController extends Controller
{
    function index(){
        $users = User::all();
        return view('admin.filter.index', compact('users'));
    }

    function getThana($cat_id){
            $thana = Thana::where('thana_id',$cat_id)->get();
            return json_encode($thana);
        }

    function getDoner($id){
            $item = User::where('thana_id',$id)->pluck('name','id');
            return json_encode($item);
    }

    function getData(){

    }

}
