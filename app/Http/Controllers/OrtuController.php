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

    function report()
    {
        return view('/pages/orangtua/report');
    }

    function payment()
    {
        return view('/pages/orangtua/payment');
    }
}
