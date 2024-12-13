<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginContoller extends Controller
{
    public function index(){
        return view('admin.login2');
    }
    public function dashboard(){
        return view('admin.dashboard.index');
    }
}
