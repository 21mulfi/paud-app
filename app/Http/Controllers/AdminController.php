<?php

namespace App\Http\Controllers;

use \App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    function index()
    {
        return view('admin');
    }

    function users()
    {
        $users = User::all(); // Mengambil semua data pengguna
        return view('/pages/admin/users', compact('users'));
    }

    function students()
    {
        return view('/pages/admin/students');
    }

    function teachers()
    {
        return view('/pages/admin/teachers');
    }

    function classroom()
    {
        return view('/pages/admin/classroom');
    }

    function profile()
    {
        return view('/pages/admin/profile');
    }

    public function create()
    {
        return view('admin.users', [
            'title' => 'Tambah',
            'method' => 'POST',
            'action' => 'user'
        ]);
    }
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

    // Fungsi untuk menampilkan form edit pengguna
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('/pages/admin/editUser', compact('user'));
    }

    // Fungsi untuk memperbarui pengguna
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

        return redirect()->back()->with('success', 'User updated successfully.');
        // return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    // Fungsi untuk menghapus pengguna
    public function deleteUser($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }
}
