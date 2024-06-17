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
}