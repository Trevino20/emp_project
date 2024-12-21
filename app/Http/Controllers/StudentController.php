<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teacher;
use App\Models\student;
use App\Models\classes;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    public function studentview(Request $request){
        if ($request->ajax()) { 
            $data = Student::join('classes', 'students.class_id', '=', 'classes.id')
            ->select('students.id', 'students.name', 'students.desig', 'students.gender', 'students.dob', 'students.phone', 'classes.class as class') // Select fields from both tables
            ->get();
            
            if ($data->isEmpty()) {
                return response()->json(['data' => []]);
            }
    
            return DataTables::of($data)->make(true);                   
        }
        $class = Classes::select('id', 'class')->get();
        $student = Student::select('gender')->distinct()->get();
        

        // $values = Student::join('classes', 'students.class_id', '=', 'classes.id')
        //             ->select('students.gender as gender', 'classes.class as class')
        //             ->distinct()
        //             ->get();

        return view('admin.dashboard.student.studenttable',compact('class','student'));
        
        }

    public function index(){
        $students = Student::with('class')->get();
        return view('admin.dashboard.student',compact('students'));
        }

    public function Show(string $id){
        $student = student::find($id);
        return view('admin.dashboard.student.studentview',compact('student'));
    }

    public function create(){
        return view('admin.dashboard.student.createstudent');
    }

    public function store(Request $request)
    {   
        dd($request);
        // Automatically assign the designation as 'Student'
        $request->merge(['desig' => 'Student']);
        
        // Validate the input data
        $request->validate([
            'name' => 'required|string|max:200',
            'gender' => 'required|string|in:Male,Female',
            'class_id' => 'required',
            'dob' => 'required|date',
            'phone' => 'required|string|max:15',
            'email' => 'required|email',
        ]);
    
        // Insert the data into the students table
        student::create([
            'name' => $request->name,
            'desig' => $request->desig,
            'gender' => $request->gender,
            'class_id' => $request->class_id, 
            'dob' => $request->dob,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);
    
        return redirect()->route('student.table')->with('success', 'Student added successfully');
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