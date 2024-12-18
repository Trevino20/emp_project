<?php

namespace App\Http\Controllers;

use App\Models\support;
use Illuminate\Http\Request;
use App\Models\student;
use App\Models\teacher;

class AppController extends Controller
{
    public function index(){
        $staff = support::select('support')  
            ->distinct()             
            ->get();
        return view('admin.createtb',compact('staff'));
    }
    public function store(Request $request){
        $role = $request->input('role');

        if ($role === 'student') {
            student::create([
                'name' =>$request->name,
                'desig' =>$request->role,
                'gender' =>$request->gender,
                'class' =>$request->class,
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

        return redirect()->route('colleges.index')->with('success','New user Add successfully');
    }

    }

