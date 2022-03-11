<?php

namespace App\Http\Controllers\example;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\SecondController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Auth;


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

    public function load()
    {
        return view('form');
    }

    public function form(request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:80',
            'password' => 'required|min:4|max:10',
        ]);

        //dd($request->all());
        //return $request;

      // \log::channel('load')->info('this form subbmite by ' .rand(1,30));
        //return redirect()->back();
        return $request;
    }

    public function error()
    {
        $i=0;        
        if($i==1){
            return view('about');
        }else{
            abort(500);
        }
    }
    public function passwordChange()
    {
        return view('passwordChange');
    }

    //for update password
    public function updatePassword(Request $request)
    {
        
        $validated = $request->validate([
            'current_password'=>'required',
            'password'=>'required|min:6|max:16|string|',
            'confirm_password'=>'required|same:password|min:6',
        ]);
        
        // //dd($request);
        $user=Auth::user();
        if(hash::check($request->current_password, $user->password)){
            $user->password=Hash::make($request->password);
            $user->save();
                Auth::logout();
                return redirect()->route('login');
            // return redirect()->back()->with('success','Password Changed Successfully! ');
            // return "ok";
        
            // return Auth::user()->password;
        }else{
            return redirect()->back()->with('error','Current Password Not Match!');
        }
    }
    public function password(Request $req)
    {
        $password=Hash::make($req->password);
        return "Password is: $password" ;
    }


}
