<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\support;
use Yajra\DataTables\Facades\DataTables;

class SupportConstroller extends Controller
{
    //

        public function showEmp(Request $request){
            
            if ($request->ajax()) { 
                $data = support::select( 'id','name','desig','support','dob','gender','phone');
                return DataTables::of($data)->make(true);                     
                }
            return view('admin.dashboard.support.try');
            }
    }