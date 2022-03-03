<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecondController extends Controller
{
    public function test(Type $var = null)
    {
        return "this come from ";
    }

}
