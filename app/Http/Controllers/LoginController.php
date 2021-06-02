<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    function index(){
        return view('login');
    }

    function ToMenu(){
        return view('menu');
    }

    function register(){
        return view('register.index');
    }

    function login(Request $request){
       
        return $request->login;
    }
}
