<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class admincontroller extends Controller
{
    function regform()
    {
        return view('Admin.register');
        
    }
    function admindashboard()
    {
        return view('Admin.dashboard');
    }
    function loginform()
    {
        return view('Admin.login');
    }
}
