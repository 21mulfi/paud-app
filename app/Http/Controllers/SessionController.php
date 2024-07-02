<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    // landing page
    function index()
    {
        return view("index");
    }

    // login page
    function loginpage()
    {
        return view("login");
    }

    // proses login
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ] , [
            'email.required' => 'Harap mengisi email',
            'password.required' => 'Harap mengisi password',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'admin'){
                return redirect('admin');
            } elseif (Auth::user()->role == 'guru'){
                return redirect('guru');
            } elseif (Auth::user()->role == 'orangtua'){
                return redirect('orangtua');
            }
        } else {
            return redirect('/login')->withErrors('Email dan password yang dimasukkan belum sesuai!')->withInput();
        }
        
    }

    function logout()
    {
        Auth::logout();
        return redirect('/login')->refresh();
    }
    // public function logout(Request $request)
    // {
    //     Auth::guard('web')->logout(); // Menggunakan guard web
    //     $request->session()->invalidate();
    //     $request->session()->forget('previous_url');
    //     return redirect('/');
    // }
}