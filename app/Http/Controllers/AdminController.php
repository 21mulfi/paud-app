<?php

namespace App\Http\Controllers;

use \App\Models\User;
use \App\Models\Pendaftaran;
use \App\Models\Guru;
use \App\Models\Kelas;
use \App\Models\Siswa;
use \App\Http\Controllers\DaftarController;
use \App\Http\Controllers\KelasController;
use App\Models\Orangtua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    function index()
    {
        return view('dashboard');
    }

    public function users(Request $request)
    {
    $users = User::query();

    // query search
    if ($request->filled('search')) {
        $search = $request->search;
        $users->where(function($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        });
    }

     // query sorting
     $sortField = $request->query('sort', 'name');
     $sortOrder = $request->query('order', 'asc');
 
     if (!in_array($sortField, ['name', 'email'])) {
         $sortField = 'name'; // Default sort field
     }
 
     $users->orderBy($sortField, $sortOrder);

    $users = $users->paginate(20); // pagination

    return view('/pages/admin/users', compact('users', 'sortField', 'sortOrder'));
    }

    function students()
    {
        $siswa = Siswa::all();
        $ortu = Orangtua::with('siswa')->get();
        $kelas = Kelas::with('siswa')->get();
        return view('/pages/admin/students', compact('siswa', 'ortu', 'kelas'));
    }

    function teachers()
    {
        $guru = Guru::with('kelas')->get();
        $kelas = Kelas::all();
        return view('/pages/admin/teachers', compact('guru', 'kelas'));
    }

    function classroom()
    {
        $kelas = Kelas::all();
        return view('/pages/admin/classroom', compact('kelas'));
    }

    function profile()
    {
        return view('/pages/admin/profile');
    }

    function registration()
    {
        $pendaftaran = Pendaftaran::all(); 
        return view('/pages/admin/registration', compact('pendaftaran'));
    }

    function parent()
    {
        $parent = Orangtua::all(); 
        return view('/pages/admin/parent', compact('parent'));
    }

    public function create()
    {
        return view('admin.users', [
            'title' => 'Tambah',
            'method' => 'POST',
            'action' => 'user'
        ]);
    }

    // Tambah User
    public function store(Request $request)
    {
        $user = new User;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = $request->password;
        $user->gender = $request->gender;
        $user->role = $request->role;
        $user->save();
        return redirect()->back()->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        return User::find($id);
    }

    // Update User
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'gender' => 'required|string|max:255',
            'role' => 'required|string|max:255'
        ]);

        $user = User::findOrFail($id);
        $user->update($request->only('name', 'email', 'gender', 'role'));

        if ($request->filled('password')) {
            $user->update([
                'password' => bcrypt($request->password),
            ]);
        }

        return redirect()->back()->with('success', 'User berhasil di update.');
    }

    // Delete User
    public function deleteUser($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }

    // Tambah Guru
    public function storeGuru(Request $request)
    {
        $guru = new Guru;
        $guru->nama = $request->nama;
        $guru->id_kelas = $request->id_kelas;
        $guru->tanggal_lahir = $request->tanggal_lahir;
        $guru->alamat = $request->alamat;
        $guru->no_hp = $request->no_hp;
        $guru->save();

        return redirect()->back()->with('success', 'Data Guru created successfully.');
    }

    public function showGuru($id)
    {
        return Guru::find($id);
    }

    // Update Guru`
    public function updateGuru(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'id_kelas' => 'required|exists:kelas,id_kelas',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:100'
        ]);
        
        $guru = Guru::findOrFail($id);
        $guru->update($request->only('nama', 'id_kelas', 'tanggal_lahir', 'alamat', 'no_hp'));

        return redirect()->back()->with('success', 'Data guru berhasil di update.');
    }

    // Delete Guru
    public function deleteGuru($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('admin.teachers')->with('success', 'Data guru berhasil terhapus.');
    }

   // Tambah Siswa
    public function storeSiswa(Request $request)
    {
        $siswa = new Siswa;
        $siswa->nama = $request->nama;
        $siswa->tanggal_lahir = $request->tgl_lahir;
        $siswa->alamat = $request->alamat;
        // $siswa->orang_tua = $request->orang_tua;
        // $siswa->kelas = $request->kelas;
        $siswa->save();

        if($request->orang_tua){

            $orang_tua = Orangtua::whereId($request->orang_tua)->first();

            $siswa->orang_tua()->attach($orang_tua);
        }

        if($request->kelas){

            $kelas = Kelas::whereId($request->kelas)->first();

            $siswa->kelas()->attach($kelas);
        }

        return redirect()->back()->with('success', 'Data Siswa created successfully.');
    }

    public function showSiswa($id)
    {
        return Siswa::find($id);
    }

    // Update Siswa
    public function updateSiswa(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'id_orangtua' => 'required|exists:orangtua,id_orangtua',
            'id_kelas' => 'required|exists:kelas,id_kelas',
            'catatan' => 'required|string|max:255',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->only('nama', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'id_orangtua', 'id_kelas', 'catatan'));

        return redirect()->back()->with('success', 'Data siswa berhasil di update.');
    }

    // Delete Siswa
    public function deleteSiswa($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('admin.students')->with('success', 'Data siswa berhasil terhapus.');
    }

    public function storeOrtuSiswa(Request $request)
    {

        $ortu = new Orangtua;
        $ortu->alamat = $request->alamat;
        $ortu->nama_ayah = $request->nama_ayah;
        $ortu->no_telp_ayah = $request->telp_ayah;
        $ortu->nama_ibu = $request->nama_ibu;
        $ortu->no_telp_ibu = $request->telp_ibu;
        $ortu->save();

        $siswa = new Siswa();
        $siswa->nama = $request->nama_siswa;
        $siswa->tanggal_lahir = $request->tgl_lahir;
        $siswa->alamat = $request->alamat;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->agama = $request->agama;
        $siswa->catatan = $request->catatan;
        $siswa->save();
        return redirect()->back()->with('success', 'Data telah dikirimkan');
    }

    public function showOrtuSiswa($id)
    {
        return Orangtua::find($id);
    }

    public function deleteParent($id)
    {
        $ortu = Orangtua::findOrFail($id);
        $ortu->delete();

        return redirect()->route('admin.parent')->with('success', 'Data orang tua berhasil terhapus.');
    }
}