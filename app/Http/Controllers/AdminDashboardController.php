<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(){
        if(auth()->check()){
            return view('administrator.dashboard.index');
        }
        return view('login');
    }
}
