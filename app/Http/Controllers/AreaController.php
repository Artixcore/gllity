<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zilla;
use App\Thana;
use Carbon\Carbon;

class AreaController extends Controller
{
    function zilla(){
        // Decending order e table show koraite eivabe likte hoy, limit er jonno shudu 2 ta show korbe
        // $categories = Category::orderBy('id','desc')->limit(2)->get();
        // $zillas = Zilla::paginate(3);
        return view('admin.area.index');
        // , compact('zillas'));
    }
    function ZillaInsert(Request $request){

        $request->validate([
            'zilla_name' => ['required','max:15','min:2']
        ]);
        Zilla::insert([
            'zilla_name' => $request->zilla_name,
            'created_at' => Carbon::now()
        ]);
        return back()->with('message','Insert Successfully');
    }

    function ZillaDelete($cat_id){
        Zilla::findOrFail($cat_id)->delete();
        return back()->with('delete','Delete Successfully');
    }
    function ZillaView($cat_id){
        $cat = Zilla::findOrFail($cat_id);
        return $cat->zilla_name;
    }
    function ZillaEdit($cat_id){
        $cat = Zilla::findOrFail($cat_id);
        return view('fontend/category_edit', compact('cat'));
    }
    function ZillaUpdate($cat_id, Request $request){
        $cat = Zilla::findOrFail($cat_id)->update([
            'zilla_name' => $request->category,
            'updated_at' => Carbon::now()
        ]);
        return redirect('/home');
    }

    function Thana(){
        $zillas = Zilla::all();
        $thanas = Thana::paginate(3);
        return view('admin.area.thana', compact('thanas','zillas'));
    }
    function ThanaInsert(Request $request){
        Thana::insert([
            'thana_name'=> $request->thana_name,
            'zilla_id'=>$request->zilla_id,
            'created_at'=> Carbon::now()
        ]);
        return redirect('/Thana');
    }

    // function categoryTrash(){
    //     $categories = Zilla::onlyTrashed()->get();
    //     return view('backend.category_delete',compact('categories'));
    // }
    // function categoryRestore($id){
    //     Zilla::withTrashed()->findOrFail($id)->restore();
    //     return back();
    // }

    // function getSubcategory($cat_id){
    //     $subcategory = Thana::where('category_id',$cat_id)->get();
    //     return json_encode($subcategory);
    // }

}
