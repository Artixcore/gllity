<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use DB;

class AutocompleteController extends Controller
{
    //for create controller - php artisan make:controller AutocompleteController

    function index()
    {
     return view('autocomplete');
    }

    function fetch(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('service__categories')
        ->where('cat_name', 'LIKE', "%{$query}%")
        ->get();
    // $data = Service::where('s_name', 'LIKE', "%{$query}%")->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li class="text-center"><a href="#">'.$row->cat_name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }



    function fetch_service(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = DB::table('services')
        ->where('s_name', 'LIKE', "%{$query}%")
        ->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li class="text-center"><a href="#">'.$row->s_name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }

}
