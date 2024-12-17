<?php

namespace App\Http\Controllers;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class LoginContoller extends Controller
{

    public function register(Request $request){
        $data = $request->validate([
            "name"=>"required",  
            "email"=> "required",
            "password"=> "required|confirmed",
            ]);

        $user = User::create($data);
        if($user){
            return redirect()->route("student.table")->with("success","");
        }
    }
    
    public function index(){
        return view('admin.login2');
    }
    public function dashboard(){
        return view('admin.dashboard.index');
    }
    public function authenticate(Request $req){
        $req->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        return view('admin.dashboard.index');

    }
}