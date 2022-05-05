<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class admincontroller extends Controller
{
    function regform()
    {
        return view("admin.register");

    }
}
