<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aktivitas;
use App\Models\Guru;
use App\Models\User;
use \App\Models\Siswa;
use \App\Models\Orangtua;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrtuController extends Controller
{
    function index()
    {
    $user = Auth::user();
    $orangtua = Orangtua::where('nama_ibu', $user->name)->first();

    if ($orangtua) {
        $siswa = $orangtua->siswa;
    } else {
        $siswa = collect();
    }

    return view('dashboard', compact('siswa', 'orangtua'));
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
