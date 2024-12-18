<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\teacher;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $teachers = Teacher::all();
    return view('admin.dashboard.table',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dashboard.createteacher'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $teacher = new Teacher();
        // $teacher->name = $request->name;
        // $teacher->desig = $request->desig;
        // $teacher->dob = $request->dob;
        // $teacher->phone = $request->phone;
        // $teacher->gender = $request->gender;
        // $teacher->email = $request->email;
        // $teacher->save();

        $request->validate([
            'name' => 'required|string|max:255',
            'desig' => 'required|string|max:255',
            'dob' => 'required|date',
            'phone' => 'required|string|max:15',
            'gender' => 'required|string|max:10',
            'email' => 'required|email',
        ]);
    
        
        Teacher::create([
            'name' => $request->name,
            'desig' => $request->desig,
            'dob' => $request->dob,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'email' => $request->email,
        ]);
        
        return redirect()->route('colleges.index')->with('success','New user Add successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $teachers = teacher::find($id);
        return view('admin.dashboard.viewteacher', compact('teachers'));
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher = teacher::find($id);

        return view('admin.dashboard.update',compact('teacher')); 
    }

    /**
     * Update the specified resource in storage.
     */
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
        $teacher = Teacher::where('id',$id)->update([
            'name' => $request->name,
            'desig' => $request->desig,
            'dob' => $request->dob,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'email' => $request->email,
        ]);
        return redirect()->route('colleges.index')->with('success','Update successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $val= Teacher::find($id);
        $val->delete();
        return redirect()->route('colleges.index')->with('success','');
    }
}