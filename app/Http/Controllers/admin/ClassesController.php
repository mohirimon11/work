<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class=DB::table('classes')->get();
        // dd($class);
        return view('admin.class.index',compact('class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classes=DB::table('classes')->where('id',$id)->first();
        return view('admin.class.view',compact('classes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $class=DB::table('classes')->get();
        $classes=DB::table('classes')->where('id',$id)->first();
        return view('admin.class.update',compact('classes'));
    //return view('admin.class.update');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'class_name'=>'required|',
        ]);
        $data=array(
            'class_name'=>$request->class_name,
        );
        // dd($data);
        if (DB::table('classes')->where('id',$id)->update($data)) {
            return redirect()->route('class.index')->with('status','Class successfully updated');
        }else{
            return redirect()->route('class.edit')->with('status','Class update fail');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (DB::table('classes')->where('id',$id)->delete()) {
            return redirect()->back()->with('status','Class successfully deleted');
        }else{
            return redirect()->back()->with('status','Class Delete fail');
        }
    }
}
