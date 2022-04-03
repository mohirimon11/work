<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use DB;

class CategoryController extends Controller
{
    // index
    public function index()
    {
        // //__query builder
        // $category=DB::table('categories')->get();
        
        //__eleoquent
        $category=Category::all();
        //dd($category);
        return view('admin.category.index',compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name'=>'required|',
        ]);
        // $data=array(
        //     'category_name'=>$request->category_name,
        //     'category_slug'=>Str::of($request->category_name)->slug('-'),
        // );
        //__Query Builder
        // if(DB::table('categories')->insert($data)){
        //     return redirect()->back()->with('status','Class successfully inserted');
        // }else{
        //     return redirect()->back()->with('status','Class insert fail');
        // }
        //__eleoquent
        // if (Category::insert($data)) {
        //     return redirect()->back()->with('status','Class successfully inserted');
        // }else {
        //     return redirect()->back()->with('status','Class insert fail');
        // }

        // dd($data);
        
        //__OOP SAVE METHOD
        $category= new Category;
        $category->category_name=$request->category_name;
        $category->category_slug=Str::of($request->category_name)->slug('-');
        if ($category->save()) {
        return redirect()->back()->with('status','Class successfully inserted');
        }else {
        return redirect()->back()->with('status','Class insert fail');
        }
        
    }
    public function edit($id)
    {
        //query
        $category=DB::table('categories')->where('id',$id)->first();
        //__eleoquent
        $category=Category::find($id);
        return view('admin.category.update',compact('category'));
    }
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'category_name'=>'required|',
        ]);
        // //__query
        // $category=array(
        //         'category_name'=>$request->category_name,
        //         'category_slug'=>Str::of($request->category_name)->slug('-'),
        // );
        // if (DB::table('categories')->where('id',$id)->update($category)) {
        //     return redirect()->back()->with('status','Class successfully inserted');
        // }
        // return redirect()->back()->with('status','Class insert fail');

        //__eloquent
        $category=Category::find($id);
        $data=array(
            'category_name'=>$request->category_name,
            'category_slug'=>Str::of($request->category_name)->slug('-'),
        );
        if ($category->update($data)) {
            return redirect()->route('category.index')->with('status','Student successfully inserted');
        }else {
            return redirect()->back()->with('status','Class insert fail');
        }
        
    }
    public function destroy($id)
    {
        // //dd($id);
        // if (DB::table('categories')->where('id',$id)->delete()) {
        //     return redirect()->back()->with('status','Class successfully deleted');
        // }else{
        //     return redirect()->back()->with('status','Class Delete fail');
        // }


        // $category=Category::find($id);
        // if ($category->delete()) {
        //     return redirect()->back()->with('status','Class successfully deleted');
        // }else {
        //     return redirect()->back()->with('status','Class Delete fail');
        // }
        if (Category::destroy($id)) {
            return redirect()->back()->with('status','Class successfully deleted');
        }else {
            return redirect()->back()->with('status','Class Delete fail');
        }
        
    }
}
