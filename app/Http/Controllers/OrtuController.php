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
    // show dashboard orang tua
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

    // show profil orang tua
    function profile()
    {
        return view('/pages/orangtua/profile');
    }

    // show report siswa
    function report()
    {
        $user = Auth::user();
        $orangtua = Orangtua::where('nama_ibu', $user->name)->first();

        if ($orangtua) {
            $siswa = $orangtua->siswa;
            $aktivitas = collect();

        foreach ($siswa as $s) {
            $aktivitasSiswa = $s->aktivitas;
            $aktivitas = $aktivitas->merge($aktivitasSiswa);
        }
        } else {
            $siswa = collect();
            $aktivitas = collect();
    }
        return view('/pages/orangtua/report', compact('siswa', 'orangtua', 'aktivitas'));
    }
}
