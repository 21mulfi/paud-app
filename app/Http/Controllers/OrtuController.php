<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrtuController extends Controller
{
    function index()
    {
        return view('dashboard');
    }

    function profile()
    {
        return view('/pages/orangtua/profile');
    }
}
