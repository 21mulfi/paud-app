<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use ValidateRequests;

class DaftarController extends Controller
{
    // pendaftaran
    function pendaftaran()
    {
        return view("pendaftaran");
    }

    public function create()
    {
        return view('admin.users', [
            'title' => 'Tambah',
            'method' => 'POST',
            'action' => 'daftar'
        ]);
    }

    // Tambah User
    public function store(Request $request)
    {
        $daftar = new Pendaftaran();
        $daftar->nama_siswa = $request->nama_siswa;
        $daftar->tempat_lahir = $request->tempat_lahir;
        $daftar->tgl_lahir = $request->tgl_lahir;
        $daftar->jenis_kelamin = $request->jenis_kelamin;
        $daftar->alamat = $request->alamat;
        $daftar->agama = $request->agama;
        $daftar->nama_ayah = $request->nama_ayah;
        $daftar->telp_ayah = $request->telp_ayah;
        $daftar->nama_ibu = $request->nama_ibu;
        $daftar->telp_ibu = $request->telp_ibu;
        $daftar->sumber_info = $request->sumber_info;
        $daftar->catatan = $request->catatan;
        $daftar->save();
        return redirect()->route('landing')->with(['success' => 'Data Registrasi Berhasil dikirim. Info selanjutnya akan kami hubungi via WhatsApp Bapak/Ibu.']);
    }

    public function show($id)
    {
        return Pendaftaran::find($id);
    }

    
}