<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ClassController extends Controller
{    
    //__constructor
    public function __construct()
    {
        $this->middleware('auth');
    }

    //__index method for class from Db
    public function index()
    {
        $class=DB::table('classes')->get();
        // dd($class);
        return view('admin.class.index',compact('class'));
    }

    public function create()
    {
        return view('admin.class.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'class_name'=>'required|unique:classes',
        ]);

        $data=array(
            'class_name'=>$request->class_name,
        );
        if(DB::table('classes')->insert($data)){
        return redirect()->back()->with('status','Class successfully inserted');
        }else{
            return redirect()->back()->with('status','Class insert fail');
        }
    }

    public function delete($id)
    {
        
        if (DB::table('classes')->where('id',$id)->delete()) {
            return redirect()->back()->with('status','Class successfully deleted');
        }else{
            return redirect()->back()->with('status','Class Delete fail');
        }
    }

    public function editPage($id)
    {
        $class=DB::table('classes')->get();
        $class=DB::table('classes')->where('id',$id)->first();
        return view('admin.class.update',compact('class'));
    }
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'class_name'=>'required|unique:classes',
        ]);

        $data=array(
            'class_name'=>$request->class_name,
        );

        if (DB::table('classes')->where('id',$id)->update($data)) {
            return redirect()->back()->with('status','Class successfully deleted');
        }else{
            return redirect()->back()->with('status','Class Delete fail');
        }
    }
}
