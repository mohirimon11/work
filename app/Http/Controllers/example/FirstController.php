<?php

namespace App\Http\Controllers\example;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\SecondController;
use Illuminate\Support\Facades\View;

class FirstController extends Controller
{
    //For About
    public function aboutIndex()
    {
        return view('about');
    }

    //For Contact
    public function contactIndex()
    {
        return view('contact');
    }

    //For Rimon
    public function rimon()
    {
        return view('rimon');
    }

    //For math
    public function math()
    {
        $a=1; $b=2;
        $c=$a+$b;
        return "$c";
    }
    // public function AboutStor(request $request)
    // {
    //     dd($request->all());
    // }

    public function AboutStor(request $request)
    {
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        //dd($data);

        //return redirect('/');

        // return redirect()->action([SecondController::class, 'test']);
        //return redirect()->away('https://www.google.com');
        return redirect()->back()->with('status', 'Student Insert!');
    }

    public function userName()
    {
        $a='mohidul ';
        $b='islam';
        $name="$a $b";
        //return view('page.mohirimon');

        if(view()->exists('page.mohirimon'))
        {
            return View::make('page.mohirimon', ['name' => $name]);

        }else{
            return "page not avalable";
        }
    }

}
