<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    function classroom()
    {
        $kelas = Kelas::all();
        return view('/pages/admin/classroom', compact('kelas'));
    }

    public function create()
    {
        return view('admin.classroom', [
            'title' => 'Tambah',
            'method' => 'POST',
            'action' => 'classroom'
        ]);
    }

    public function store(Request $request){
        $kelas = new Kelas();
        $kelas->nama_kelas = $request->nama_siswa;
        $kelas->kapasitas_maks = $request->kapasitas;

        $kelas->save();
        return redirect()->back()->with(['success' => 'Data Berhasil disimpan.']);
    }

    public function show($id)
    {
        return Kelas::find($id);
    }
}
