<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teacher;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        $students = student::all();
        return view('admin.dashboard.student',compact('students'));
        
        return "Hello from rount";
    }

    public function Show(){
        $students = student::all();
        return view('admin.dashboard.student',compact('students'));
    }
}