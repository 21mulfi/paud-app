<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        $gurus = Guru::all();
        $guruName = $user->name;

        // Cari objek Guru yang sesuai dengan nama pengguna yang sedang login
        $guru = $gurus->firstWhere('nama', $guruName);

        if ($guru) {
            $kelass = $guru->kelass; // Pastikan relasi kelas terdefinisi di model Guru
            $siswa = $kelass->siswa; // Pastikan relasi siswa terdefinisi di model Kelas
        } else {
            $siswa = collect(); // Kembalikan koleksi kosong jika tidak ada guru yang cocok
            $kelass = null; // Tidak ada kelas jika tidak ada guru yang cocok
        }

        return view('/pages/guru/listsiswa', compact('siswa', 'guru'));
    }

    // public function show($id)
    // {
    //     $guru = Guru::with('kelas.siswa')->findOrFail($id);
    //     return view('/pages/guru/listsiswa', compact('guru'));
    // }
    
}
