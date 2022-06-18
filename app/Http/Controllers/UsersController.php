<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    function profile(){
        return view('layouts.profile');
    }
    function login(){
        return view('layouts.login');
    }
    function contact(){
        return view('layouts.contact');
    }
}
