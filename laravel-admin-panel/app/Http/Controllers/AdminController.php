<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function login(){
            if(auth()->check()){
                return redirect()->route('admin.index');
            }

        return view('admin.login');
    }
    public function register(){
        return view('admin.register');
    }
    public function forgotpassword(){
        return view('admin.forgot-password');
    }
}
