<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\OrtuController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// landing page & login
Route::get('/', [SessionController::class, 'index'])->name('landing');
Route::get('/login', [SessionController::class, 'loginpage'])->name('loginpage');
Route::post('/login', [SessionController::class, 'login']);

// pendaftaran
Route::get('/pendaftaran', [DaftarController::class, 'pendaftaran'])->name('pendaftaran');
Route::post('/pendaftaran', [DaftarController::class, 'store'])->name('daftar');


Route::middleware(['web'])->group(function () {
    // menu admin
    Route::middleware(['checkRole:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/students', [AdminController::class, 'students'])->name('admin.students');
    Route::post('/admin/registrasi', [AdminController::class, 'storeSiswa'])->name('admin.students.store');
    Route::put('/admin/students/{id}', [AdminController::class, 'updateSiswa'])->name('admin.students.update');
    Route::delete('students/{id}', [AdminController::class, 'deleteSiswa'])->name('admin.students.delete');

    Route::get('/admin/teachers', [AdminController::class, 'teachers'])->name('admin.teachers');
    Route::post('/admin/teachers', [AdminController::class, 'storeGuru'])->name('admin.teachers.store');
    Route::put('/admin/teachers/{id}', [AdminController::class, 'updateGuru'])->name('admin.teachers.update');
    Route::delete('teachers/{id}', [AdminController::class, 'deleteGuru'])->name('admin.teachers.delete');

    Route::get('/admin/classroom', [KelasController::class, 'classroom'])->name('admin.classroom');
    Route::post('/admin/classroom', [KelasController::class, 'store'])->name('admin.classroom.store');
    Route::put('/admin/classroom/{id}', [KelasController::class, 'update'])->name('admin.classroom.update');
    Route::delete('classroom/{id}', [KelasController::class, 'delete'])->name('admin.classroom.delete');

    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::put('/admin/profile/{id}', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    
    Route::get('/admin/registrasi', [AdminController::class, 'registration'])->name('admin.registration');
    Route::post('/admin/registrasi', [AdminController::class, 'storeOrtuSiswa'])->name('admin.registration.store');

    Route::post('/admin/users/', [AdminController::class, 'store'])->name('admin.users.store');
    Route::put('/admin/users/{id}', [AdminController::class, 'update'])->name('admin.users.update');
    Route::delete('users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');

    Route::get('/admin/data_orangtua', [AdminController::class, 'parent'])->name('admin.parent');
    Route::delete('/parent/{id}', [AdminController::class, 'deleteParent'])->name('admin.parent.delete');
    });

    //menu guru
    Route::middleware(['checkRole:guru'])->group(function () {
        Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
        Route::get('/guru/jadwal', [GuruController::class, 'jadwal'])->name('guru.jadwal');
        Route::get('/guru/penilaian', [GuruController::class, 'penilaian'])->name('guru.penilaian');
        Route::get('/guru/penilaian/form', [GuruController::class, 'form_penilaian'])->name('guru.form_penilaian');
        Route::get('/guru/listsiswa', [GuruController::class, 'listsiswa'])->name('guru.listsiswa');
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