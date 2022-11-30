<?php

namespace App\Http\Controllers\Superadmin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Currency;
use App\Location;
use App\Service;
use App\Social;
use App\Footer;
use App\About;
use App\Coupon;
use App\Meta;
use App\Privacy;
use App\Site;
use App\Site_Logo;
use App\Slide;
use App\Terms;
use Illuminate\Support\Facades\DB;
use Image;

class SettingsController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('superadmin.settings.service');
    }

    function site_logo(Request $request){

        if($request->hasFile('site_logo')){
            $site_logo =   $request->file('site_logo');
            $filenames = time() . '.' .$site_logo->getClientOriginalExtension();
            Image::make($site_logo)->save( public_path('/frontend/images/'. $filenames) );
            $site = new Site_Logo();
            $site->site_logo = $filenames;
            $site->save();
        }

        return back();
    }

    public function general(Request $request, $id)
    {
        
        if($request->hasFile('site_logo')){
            $site_logo =   $request->file('site_logo');
            $filenames = time() . '.' .$site_logo->getClientOriginalExtension();
            Image::make($site_logo)->save( public_path('/frontend/images/'. $filenames) );
            $site = new Site_Logo();
            $site->site_logo = $filenames;
            // $site->save();
        }

            $site = Site::find($id);

                $site->site_logo = $filenames;
                $site->site_name = $request->site_name;
                $site->site_address = $request->site_address;
                $site->site_location = $request->site_from; // Start From
                $site->site_email = $request->site_email;
                $site->site_phone = $request->site_phone;
                // $site->site_logo = $filenames;

                $site->save();

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

    function delete_currency($id){

        Currency::findOrFail($id)->delete();
        return back()->with('delete','delete successfull!!');
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

    function delete_social($id){

        Social::findOrFail($id)->delete();
        return back()->with('delete','delete successfull!!');
    }


    public function update_footer(Request $request, $id)
    {
        $footers = Footer::find($id);
        $footers->footer = $request->footer;
        $footers->save();

        return view('superadmin.settings.service', compact('footers'));
        }



    // About US

    function showabout(){
        $about = About::all();
        return view('about', compact('about'));
    }

    public function about(Request $request, $id)
    {
        $abouts = About::find($id);
        $abouts->about_title = $request->about_title;
        $abouts->about_desc = $request->about_desc;
        $abouts->save();

        return back();
    }



    // Privacy
    public function privacy(Request $request)
    {
        Privacy::insert([
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

    function edit_seo($meta_author){

        $seos = Meta::where('meta_author', $meta_author)->get();
        return view('superadmin.settings.seosettings', compact('seos'));

    }

    function update_seo(Request $request, $id){

        $seos = Meta::find($id);
        $seos->meta_author = $request->meta_author;
        $seos->meta_desc = $request->meta_desc;
        $seos->meta_keywords = $request->meta_keywords;
        $seos->save();

        return view('superadmin.settings.service');
    }

    function delete_seo($id){

        Meta::findOrFail($id)->delete();
        return back()->with('delete','delete successfull!!');
    }

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


    // Coupons
    function view_cup(){

    $coupon = Coupon::paginate(10);
     return view('superadmin.coupon.coupon', compact('coupon'));
    }

    function add_coupon(Request $request){

        $coupon = new Coupon();

        $coupon->coupon_code = $request->coupon_code;
        $coupon->start_date  = $request->start_date;
        $coupon->end_date    = $request->end_date;
        $coupon->use_limit   = $request->use_limit;
        $coupon->percent     = $request->percent;
        $coupon->desc        = $request->desc;

        $coupon->save();

    return back();
    }

    function edit_coupon($coupon_code){

        $coupon = Coupon::where('coupon_code', $coupon_code)->get();
        return view('superadmin.coupon.edit', compact('coupon'));
    }

    function update_coupon(Request $request, $id){

        $coupon = Coupon::find($id);

        $coupon->coupon_code = $request->coupon_code;
        $coupon->start_date  = $request->start_date;
        $coupon->end_date    = $request->end_date;
        $coupon->use_limit   = $request->use_limit;
        $coupon->percent     = $request->percent;
        $coupon->desc        = $request->desc;

        $coupon->save();

        return back();

    }

    function delete_coupon($id){

        Coupon::findOrFail($id)->delete();
        return back()->with('delete','delete successfull!!');
    }



    function slide_view(){

        // $slide = Slide::paginate(5);
        return view('superadmin.slides.slide');
        // return view('superadmin.slides.slide', compact('slide'));
    }


    function slide_add(Request $request){


        if($request->hasFile('slide')){
            $slide =   $request->file('slide');
            $filenames = time() . '.' .$slide->getClientOriginalExtension();
            Image::make($slide)->save( public_path('/admin/images/slides/'. $filenames) );
            $cat = Auth::user();
            $cat->slide = $filenames;
            // $cat->save();
        }

        $cat =new Slide();

            $cat->slide_token = Auth::user()->name.rand(1,5555);
            $cat->slide_title = $request->slide_title;
            $cat->slide_text  = $request->slide_text;
            $cat->slide  = $filenames;
            $cat->save();

        return back();

    }

    function slide_edit($slide_token){

        $slide = Slide::where('slide_token', $slide_token)->get();
        return view('superadmin.slides.edit', compact('slide'));
    }

    function slide_update(Request $request, $id){

        if($request->hasFile('slide')){
            $slide =   $request->file('slide');
            $filename = time() . '.' .$slide->getClientOriginalExtension();
            Image::make($slide)->save( public_path('/admin/images/slides/'. $filename) );
            $cat = Auth::user();
            $cat->slide = $filename;
            // $cat->save();
        }

        $slide = Slide::find($id);

            $slide->slide_token = Auth::user()->name.rand(1,5555);
            $slide->slide_text = $request['slide_text'];
            $slide->slide_title = $request['slide_title'];
            $slide->slide = $filename;
            $slide->save();

            return view('superadmin.slides.slide');
    }

    function deleteslide($id){

        Slide::findOrFail($id)->delete();
        return back()->with('delete','delete successfull!!');
    }


        // Terms
        public function terms(Request $request)
        {
            Terms::insert([
                'term_title' => $request->term_title,
                'term_desc' => $request->term_desc,
                'created_at' => Carbon::now()
            ]);
            return back()->with('message','Insert Successfully');
        }

        function edit_terms($term_title){

            $terms = Terms::where('term_title', $term_title)->get();
            return view('superadmin.settings.editterms', compact('terms'));

        }

        function update_terms(Request $request, $id){

            $seos = Meta::find($id);
            $seos->meta_author = $request->meta_author;
            $seos->meta_desc = $request->meta_desc;
            $seos->meta_keywords = $request->meta_keywords;
            $seos->save();

            return view('superadmin.settings.service');
        }

        function delete_terms($id){

            Meta::findOrFail($id)->delete();
            return back()->with('delete','delete successfull!!');
        }


}
