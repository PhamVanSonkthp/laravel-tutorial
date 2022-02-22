<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function auth;
use function redirect;
use function view;

class AdminController extends Controller
{
    public function loginAdmin(){
        if(auth()->check()){
            return redirect()->to('administrator/dashboard');
        }
        return view('administrator.login.index');
    }

    public function postLoginAdmin(Request $request){
        $remember = $request->has('remember_me') ? true : false;
        if(auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ],$remember)){
            return redirect()->to('administrator/dashboard');
        }

        return view('administrator.login.index');
    }

    public function logout() {
        Auth::logout();
        return redirect('/admin');
    }

}
