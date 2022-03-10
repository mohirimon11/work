<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    //For UserId class
    public function details($id)
    {
        $id = Crypt::decryptString($id);
        echo $id;
    }

    //For Year class
    public function year($year)
    {
        $year = Crypt::decryptString($year);
        echo "This is $year";
    }

    //for password store
    // public function store(Request $req)
    // {
    //     $password=$req->password;
    //     echo "this is : $password";
    // }
}
