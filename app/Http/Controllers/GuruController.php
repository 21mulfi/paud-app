<?php

namespace App\Http\Controllers;

use App\Models\Guru;
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

    function penilaian()
    {
        return view('/pages/guru/penilaian');
    }

    function form_penilaian()
    {
        return view('/pages/guru/form_penilaian');
    }

    function listsiswa()
    {
        return view('/pages/guru/listsiswa');
    }
    
}
