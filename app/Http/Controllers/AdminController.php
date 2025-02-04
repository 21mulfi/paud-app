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
    // show dashboard admin
    function index()
    {
        $userCount = User::count();
        $classCount = Kelas::count();
        $parentCount = Orangtua::count();
        $studentCount = Siswa::count();
        $teacherCount = Guru::count();
        return view('dashboard', compact('userCount', 'classCount', 'parentCount', 'studentCount', 'teacherCount'));
    }

    // show data user
    public function users(Request $request)
    {
    $users = User::query();

    // query search user
    if ($request->filled('search')) {
        $search = $request->search;
        $users->where(function($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        });
    }

     // query sorting user
     $sortField = $request->query('sort', 'name');
     $sortOrder = $request->query('order', 'asc');
 
     if (!in_array($sortField, ['name', 'email'])) {
         $sortField = 'name'; // Default sort field
     }
 
     $users->orderBy($sortField, $sortOrder);

    $users = $users->paginate(20); // pagination

    $gurus = Guru::all();
    $orangtuas = Orangtua::all();

    return view('/pages/admin/users', compact('users', 'sortField', 'sortOrder', 'gurus', 'orangtuas'));
    }

    // show data siswa
    function students()
    {
        $siswa = Siswa::all();
        $ortu = Orangtua::with('siswa')->get();
        $kelas = Kelas::with('siswa')->get();
        return view('/pages/admin/students', compact('siswa', 'ortu', 'kelas'));
    }

    // show data guru
    function teachers()
    {
        $guru = Guru::with('kelas')->get();
        $kelas = Kelas::all();
        return view('/pages/admin/teachers', compact('guru', 'kelas'));
    }

    // show data kelas
    function classroom()
    {
        $kelas = Kelas::with(['siswa', 'gurus'])->get();
        return view('/pages/admin/classroom', compact('kelas'));
    }

    // show profile
    function profile()
    {
        return view('/pages/admin/profile');
    }

    // show data verifikasi registrasi
    function registration()
    {
        $pendaftaran = Pendaftaran::all(); 
        return view('/pages/admin/registration', compact('pendaftaran'));
    }

    // show data orang tua
    function parent()
    {
        $parent = Orangtua::all(); 
        return view('/pages/admin/parent', compact('parent'));
    }

    // Tambah User
    public function store(Request $request)
    {
        $user = new User;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->role = $request->role;

        if ($request->role == 'guru') {
            $user->name = $request->guru_nama;
        } elseif ($request->role == 'orangtua') {
            $user->name = $request->nama_ibu;
        } else {
            $user->name = $request->name;
        }

        $user->save();
        return redirect()->back()->with('success', 'Data User berhasil ditambahkan.');
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

        return redirect()->back()->with('success', 'Data User berhasil di update.');
    }

    // Delete User
    public function deleteUser($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->route('admin.users')->with('success', 'Data User berhasil dihapus.');
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

        return redirect()->back()->with('success', 'Data Guru berhasil ditambahkan.');
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
        $siswa->id_orangtua = $request->id_orangtua;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->save();

        return redirect()->back()->with('success', 'Data Siswa berhasil ditambahkan.');
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

        return redirect()->route('admin.students')->with('success', 'Data siswa berhasil dihapus.');
    }

    // tambah ortu
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
        return redirect()->back()->with('success', 'Data registrasi berhasil di verifikasi');
    }

    public function showOrtuSiswa($id)
    {
        return Orangtua::find($id);
    }

    // delete ortu
    public function deleteParent($id)
    {
        $ortu = Orangtua::findOrFail($id);
        $ortu->delete();

        return redirect()->route('admin.parent')->with('success', 'Data orang tua berhasil dihapus.');
    }

    // update guru
    public function updateParent(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telp_ayah' => 'required|string|max:255',
            'no_telp_ibu' => 'required|string|max:255'
        ]);

        $siswa = Orangtua::findOrFail($id);
        $siswa->update($request->only('nama_ayah', 'nama_ibu', 'alamat', 'no_telp_ayah', 'no_telp_ibu'));

        return redirect()->back()->with('success', 'Data siswa berhasil di update.');
    }

    // update profile
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
}