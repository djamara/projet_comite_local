<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
       
        $login = $request->login;
        $password = $request->password;

        $user = User::where('login','=',$login)->where('passdecode','=',$password)->get();
        //$reponse = User::all();
        //return $user;

        if(count($user) > 0){
            Session::put('login',$user[0]->login);
            Session::put('password',$user[0]->passdecode);
            session_start();
            return "success";
        }else{
            return "echec";
        }
    }

    function deconnexion(){
         return view('login');
    }
}
