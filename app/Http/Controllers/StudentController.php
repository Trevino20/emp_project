<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        return "Hello from rount";
    }

    public function Show(){
        return 'show rount methods';
    }
}
