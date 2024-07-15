<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    // show data kelas
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

    // tambah data kelas
    public function store(Request $request){
  
        $kelas = new Kelas();
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->kapasitas_maks = $request->kapasitas_maks;

        $kelas->save();
        return redirect()->back()->with(['success' => 'Data Berhasil disimpan.']);
    }

    public function show($id)
    {
        return Kelas::find($id);
    }

    // delete data kelas
    public function delete($id)
    {
        $kelas = Kelas::findOrFail($id);
        // $kelas = Kelas::gurus();
        $kelas->gurus()->delete();
        $kelas->delete();

        return redirect()->route('admin.classroom')->with('success', 'Data kelas berhasil terhapus.');
    }

    // update data kelas
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'kapasitas_maks' => 'required|string|max:255'
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->only('nama_kelas', 'kapasitas_maks'));

        return redirect()->back()->with('success', 'Data kelas berhasil di update.');
    }
}
