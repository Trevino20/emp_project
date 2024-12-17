<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function register(Request $request){
        $data = $request->validate([
            "name"=>"required",  
            "email"=> "required",
            "password"=> "required|confirmed",
            ]);

        $user = User::create($data);
        if($user){
            return redirect()->route("login")->with("success","");
        }
    }

    public function index(){
        return view('admin.login2');
    }
    // public function dashboard(){
    //     return view('admin.dashboard.index');
    // }
    public function authenticate(Request $req){
        $cred=$req->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if(Auth::attempt($cred)){
            return view('admin.dashboard.index');
            // return redirect()->route('admin.dashboard.index')->with('success','');
        }else{
            return redirect()->route('login')->with('error','Try');
        }
    }
    public function dashboard(){
        if(Auth::check()){
            return view('admin.dashboard.index');
    }else{
        return redirect()->route('admin.login2')->with('error','Login again');
    }}
    public function logout() {
        Auth::logout();
        return redirect()->route('login')->with('success','Logout SuccessFull');
    }
}