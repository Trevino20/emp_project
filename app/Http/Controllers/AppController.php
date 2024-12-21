<?php

namespace App\Http\Controllers;

use App\Models\support;
use Illuminate\Http\Request;
use App\Models\student;
use App\Models\teacher;
use App\Models\classes;

class AppController extends Controller
{
    public function index(){
        $staff = support::select('support')  
            ->distinct()             
            ->get();
        $class = Classes::select('id', 'class')->get();
        return view('admin.createtb',compact('staff','class'));
    }
    public function store(Request $request){
        $role = $request->input('role');

        if ($role === 'student') {
            student::create([
                'name' =>$request->name,
                'desig' =>$request->role,
                'gender' =>$request->gender,
                'class_id' =>$request->class_id,
                'dob' =>$request->dob,
                'phone' =>$request->phone,
                'email' =>$request->email,
    
            ]);
        } elseif ($role === 'teacher') {
            Teacher::create([
                'name' => $request->name,
                'desig' => $request->role,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'phone' => $request->phone,
                'email' => $request->email,
            ]);
        } elseif ($role === 'support') {
            Support::create([
                'name' => $request->name,
                'desig' => $request->role,
                'support' => $request->support,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'phone' => $request->phone,
                'email' => $request->email,
            ]);
        }

        return redirect()->route('student.view')->with('success','New user Add successfully');
    }

    }