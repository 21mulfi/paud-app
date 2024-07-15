<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use App\Models\Guru;
use App\Models\User;
use \App\Models\Siswa;
use \App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    // show dashboard guru
    function index()
    {
        $user = Auth::user();
        $gurus = Guru::all();
        $guruName = $user->name;

        $guru = $gurus->firstWhere('nama', $guruName);

        if ($guru) {
            $kelass = $guru->kelass;
            $siswa = $kelass->siswa;
        } else {
            $siswa = collect();
            $kelass = null;
        }

        return view('dashboard', compact('siswa', 'guru'));
    }

    // show profile guru
    function profile()
    {
        return view('/pages/guru/profile');
    }

    // show penilaian guru
    function penilaian()
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

        return view('/pages/guru/penilaian', compact('siswa', 'guru'));
    }


    // show form penilaian
    function form_penilaian($id_siswa)
    {
        $siswa = Siswa::findOrFail($id_siswa);

        return view('/pages/guru/form_penilaian', compact('siswa'));
    }

    // show list siswa guru
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

    // update profile guru
    public function updateProfile(Request $request, $id)
    {

        if (Auth::user()->id != $id) {
            return redirect()->back()->withErrors(['msg' => 'Anda tidak memiliki izin untuk mengubah data ini.']);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'gender' => 'required|string'
        ]);

        $user = User::findOrFail($id);
        $user->update($request->only('name', 'email', 'gender'));

        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->back()->with('success', 'Data profil berhasil di update.');
    }

    public function formPenilaian($id_siswa)
    {
        $siswa = Siswa::findOrFail($id_siswa);
        return view('guru.form_penilaian', compact('siswa'));
    }

    // submit nilai
    public function nilai(Request $request)
    {
        $nilai = new Aktivitas();
        $nilai->siswa = $request->id_siswa;
        $nilai->tanggal = $request->tanggal;
        $nilai->aktivitas_siswa = $request->aktivitas_siswa;
        $nilai->save();

        return redirect()->back()->with('success', 'Data aktivitas berhasil disimpan.');
    }
}
