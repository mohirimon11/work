<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return "this is index";
        //$student=DB::table('students')->orderBy('roll','ASC')->get();
        $student = DB::table('students')
            ->leftJoin('classes', 'classes.id', '=', 'students.class_id')
            ->select('students.id','students.name','students.roll','students.phone','classes.class_name','students.class_id')
            ->get();
        return view('admin.student.index',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes=DB::table('classes')->get();
        return view('admin.student.create',compact('classes'));
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
            'class_id'=>'required|',
            'name'=>'required|',
            'roll'=>'required|unique:students',
            'phone'=>'required|unique:students',

        ]);

        $data=array(
            'class_id'=>$request->class_id,
            'name'=>$request->name,
            'roll'=>$request->roll,
            'phone'=>$request->phone,


        );
        if(DB::table('students')->insert($data)){
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
        // $students=DB::table('students')->where('id',$id)->first();
        $students = DB::table('students')
            ->leftJoin('classes', 'classes.id', '=', 'students.class_id')
            ->select('students.id','students.name','students.roll','students.phone','classes.class_name','students.class_id')
            ->where('students.id',$id)
            ->first();
        return view('admin.student.view',compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classes=DB::table('classes')->get();
        $student=DB::table('students')->where('id',$id)->first();
        return view('admin.student.update',compact('classes','student'));
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
            'class_id'=>'required|',
            'name'=>'required|',
            'roll'=>'required|',
            'phone'=>'required|',

        ]);
        $data=array(
            'class_id'=>$request->class_id,
            'name'=>$request->name,
            'roll'=>$request->roll,
            'phone'=>$request->phone,


        );
        //dd($data);
        if(DB::table('students')->where('id',$id)->update($data)){
        return redirect()->route('student.index')->with('status','Student successfully inserted');
        }else{
            return redirect()->route('student.edit')->with('status','student insert fail');
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
        if (DB::table('students')->where('id',$id)->delete()) {
            return redirect()->back()->with('status','Class successfully deleted');
        }else{
            return redirect()->back()->with('status','Class Delete fail');
        }
    }
}
