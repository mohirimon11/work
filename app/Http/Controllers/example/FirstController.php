<?php

namespace App\Http\Controllers\example;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

}
