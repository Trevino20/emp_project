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

    public function Show(string $id){
        $student = student::find($id);
        return view('admin.dashboard.student.studentview',compact('student'));
    }

    public function create(){
        return view('admin.dashboard.student.createstudent');
    }

    public function store(Request $request){

        $request->merge(['desig' => 'Student']);
        
        $request->validate([
            'name'=> 'required|string|max:200',
            'gender' => 'required|string|in:Male,Female',
            'class' => 'required|int', 
            'dob' => 'required|date',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|email',
        ]);


        student::create([
            'name' =>$request->name,
            'desig' =>$request->desig,
            'gender' =>$request->gender,
            'class' =>$request->class,
            'dob' =>$request->dob,
            'phone' =>$request->phone,
            'email' =>$request->email,

        ]);

        return redirect()->route('student.table')->with('success','student Add successfully');

        
    }

    public function edit(string $id){
        $student = student::find($id);
            return view('admin.dashboard.student.updatestudent',compact('student'));
        
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'desig' => 'required|string|max:255',
            'dob' => 'required|date',
            'phone' => 'required|string|max:15',
            'gender' => 'required|string|max:10',
            'email' => 'required|email',

        ]);
        $student = student::where('id',$id)->update([
            'name' => $request->name,
            'desig' => $request->desig,
            'dob' => $request->dob,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'email' => $request->email,
        ]);
        return redirect()->route('student.table')->with('success','Update successfully');

    }
}