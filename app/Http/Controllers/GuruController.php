<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    function index()
    {
        return view('dashboard');
    }

    function profile()
    {
        return view('/pages/guru/profile');
    }

    function jadwal()
    {
        return view('/pages/guru/jadwal');
    }
}
