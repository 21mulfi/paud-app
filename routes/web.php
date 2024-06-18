<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\OrtuController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DaftarController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// landing page & login
Route::get('/', [SessionController::class, 'index'])->name('landing');
Route::get('/login', [SessionController::class, 'loginpage'])->name('loginpage');
Route::post('/login', [SessionController::class, 'login']);

// pendaftaran
Route::get('/pendaftaran', [DaftarController::class, 'pendaftaran'])->name('pendaftaran');

Route::middleware(['web'])->group(function () {
    // menu admin
    Route::middleware(['checkRole:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/students', [AdminController::class, 'students'])->name('admin.students');
    Route::get('/admin/teachers', [AdminController::class, 'teachers'])->name('admin.teachers');
    Route::get('/admin/classroom', [AdminController::class, 'classroom'])->name('admin.classroom');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/admin/users', [AdminController::class, 'store'])->name('admin.users.store');
    Route::put('/admin/users/{id}', [AdminController::class, 'update'])->name('admin.users.update');
    Route::delete('users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    });

    //menu guru
    Route::middleware(['checkRole:guru'])->group(function () {
        Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
        Route::get('/guru/jadwal', [GuruController::class, 'jadwal'])->name('guru.jadwal');
        Route::get('/guru/kurikulum', [GuruController::class, 'daftarsiswa'])->name('guru.kurikulum');
        Route::get('/guru/report', [GuruController::class, 'report'])->name('guru.report');
        Route::get('/guru/profile', [GuruController::class, 'profile'])->name('guru.profile');
    });

    //menu orang tua
    Route::middleware(['checkRole:orangtua'])->group(function () {
        Route::get('/orangtua', [OrtuController::class, 'index'])->name('orangtua.index');
        Route::get('/orangtua/report', [OrtuController::class, 'report'])->name('orangtua.report');
        Route::get('/orangtua/payment', [OrtuController::class, 'payment'])->name('orangtua.payment');
        Route::get('/orangtua/profile', [OrtuController::class, 'profile'])->name('orangtua.profile');
    });
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');