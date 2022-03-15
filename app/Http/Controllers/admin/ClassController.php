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
}
