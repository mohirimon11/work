<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher=DB::table('teachers')->paginate(4);
        //dd($class);
        return view('admin.teacher.index',compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return "path ok";
        return view('admin.teacher.create');
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
            'name'=>'required',
            'email'=>'required|unique:teachers',
            'address'=>'required',
        ]);

        $data=array(
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,

        );
        if(DB::table('teachers')->insert($data)){
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
        $teacher=DB::table('teachers')->where('id',$id)->first();
        return view('admin.teacher.view',compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return "path ok";
        $teacher=DB::table('teachers')->where('id',$id)->first();
        return view('admin.teacher.update',compact('teacher'));
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
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',

        ]);
        $data=array(
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
        );
        if (DB::table('teachers')->where('id',$id)->update($data)) {
            return redirect()->route('teacher.index')->with('status','Class successfully updated');
        }else{
            return redirect()->route('teacher.edit')->with('status','Class update fail');
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
        if (DB::table('teachers')->where('id',$id)->delete()) {
            return redirect()->back()->with('status','Class successfully deleted');
        }else{
            return redirect()->back()->with('status','Class Delete fail');
        }
    }
}
