<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\support;

class SupportConstroller extends Controller
{
    //

    public function index(Request $req){

        dd($req->ajax());

        // return dd(support::all());

        $staff = support::all();
        return view("admin.dashboard.support.supporttable",compact('staff'));
    }
}
