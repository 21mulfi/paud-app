<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index()
    {
        return view('admin');
    }

    function users()
    {
        return view('/pages/admin/users');
    }

    function students()
    {
        return view('/pages/admin/students');
    }

    function teachers()
    {
        return view('/pages/admin/teachers');
    }

    function classroom()
    {
        return view('/pages/admin/classroom');
    }

    function profile()
    {
        return view('/pages/admin/profile');
    }
}
