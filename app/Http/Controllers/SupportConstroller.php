<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\support;
use Yajra\DataTables\Facades\DataTables;

class SupportConstroller extends Controller
{
    //

        public function showEmp(Request $request){
            // dd($request->ajax());
            // $support = support::all();
            // return view('admin.dashboard.support.try',compact('support'));
            
            if ($request->ajax()) { 
                $data = support::query();
                return DataTables::of($data)->make(true);                     
                }
            return view('admin.dashboard.support.try');
            }
    }