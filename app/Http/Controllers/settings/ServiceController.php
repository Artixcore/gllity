<?php

namespace App\Http\Controllers\settings;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\About;
use App\Company;
use App\Currency;
use App\Footer;
use App\Location;
use App\Meta;
use App\Service;
use App\Social;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Image;

class ServiceController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.settings.service');
    }


    public function updatesite(Request $request,$id)
    {
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filenames = time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->save(public_path('/user/'. $filenames));
            $cat = Auth::user();
            $cat->avatar = $filenames;
        }

        $cat = User::find($id);
        if($cat){
            $cat->name   = $request->name;
            $cat->b_name = $request->b_name;
            $cat->email  = $request->email;
            $cat->b_website = $request->b_website;
            $cat->phone = $request->phone;
            $cat->location = $request->location;
            $cat->address = $request->address;
            $cat->avatar  = $filenames;
            $cat->save();

        } else {
        return back();
        }
        return back();

    }


    public function currency(Request $request)
    {
            Currency::insert([
                'c_name' => $request->c_name,
                'c_symbol' => $request->c_symbol,
                'c_code' => $request->c_code,
                'created_at' => Carbon::now()
            ]);
            return back()->with('message','Insert Successfully');

    }


    // Social
    public function social(Request $request)
    {
        Social::insert([
            'social_icon' => $request->social_icon,
            'social_links' => $request->social_links,
            'created_at' => Carbon::now()
        ]);
        return back()->with('message','Insert Successfully');
    }


    // footer
    public function footer(Request $request)
    {
        Footer::insert([
            'footer' => $request->footer,
            'created_at' => Carbon::now()
        ]);
        return back()->with('message','Insert Successfully');
    }


    // About US
    public function about(Request $request)
    {
        About::insert([
            'about_title'=> $request->about_title,
            'about_desc' => $request->about_desc,
            'created_at' => Carbon::now()
        ]);
        return back()->with('message','Insert Successfully');
    }



    // Privacy
    public function privacy(Request $request)
    {
        About::insert([
            'privacy_title'=> $request->privacy_title,
            'privacy_desc' => $request->privacy_desc,
            'created_at' => Carbon::now()
        ]);
        return back()->with('message','Insert Successfully');
    }


    // SEO
    public function seo(Request $request)
    {
        Meta::insert([
            'meta_author' => $request->meta_author,
            'meta_desc' => $request->meta_desc,
            'meta_keywords' => $request->meta_keywords,
            'created_at' => Carbon::now()
        ]);
        return back()->with('message','Insert Successfully');
    }


    // Company
    // function company(Request $request){
    //     User::insert([
    //         'b_name' => $request->b_name,
    //         'name' => $request->name,
    //         'phone' => $request->phone,
    //         'email' => $request->email,
    //         'b_logo' => $request->b_logo,
    //         'b_country' => $request->b_country,
    //         'b_city' => $request->b_city,
    //         'b_currency' => $request->b_currency,
    //         'password' => $request->Hash::make('password'),,
    //         'created_at' => Carbon::now()
    //     ]);
    //     return back()->with('message','Insert Successfully');
    // }



    // Location
    function location(Request $request){
        Location::insert([
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'created_at' => Carbon::now()
        ]);
        return back()->with('message','Insert Successfully');
    }

    function edit_location(Request $request, $id){
    $cat = Location::find($id);
    if($cat){

    $cat->city = $request['city'];
    $cat->state = $request['state'];
    $cat->country = $request['country'];
    $cat->save();

    } else {
    return redirect()->back();
    }

    return redirect()->back();
    }

    function locations(){
        $location = Location::paginate(5);
        return view('admin.location.location', compact('location'));
    }

    public function edit(Service $service)
    {
        //
    }


    public function update(Request $request, Service $service)
    {
        //
    }


    public function destroy(Service $service)
    {
        //
    }
}
