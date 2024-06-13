<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\OrtuController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [SessionController::class, 'index']);
Route::post('/', [SessionController::class, 'login']);

// Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');

// Route::get('/admin', [AdminController::class, 'index'])->middleware('checkRole:admin');

Route::middleware(['web'])->group(function () {
    // menu admin
    Route::middleware(['checkRole:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('users');
    Route::get('/admin/students', [AdminController::class, 'students'])->name('students');
    Route::get('/admin/teachers', [AdminController::class, 'teachers'])->name('teachers');
    Route::get('/admin/class', [AdminController::class, 'class'])->name('class');
});
});


//menu guru
Route::middleware(['checkRole:guru'])->group(function () {
    Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
    Route::get('/guru/daftarsiswa', [GuruController::class, 'daftarsiswa'])->name('guru.daftarsiswa');
    Route::get('/guru/kurikulum', [GuruController::class, 'daftarsiswa'])->name('guru.kurikulum');
    Route::get('/guru/report', [GuruController::class, 'report'])->name('guru.report');
});

//menu orang tua
Route::middleware(['checkRole:orangtua'])->group(function () {
    Route::get('/orangtua', [OrtuController::class, 'index'])->name('orangtua.index');
    Route::get('/orangtua/report', [OrtuController::class, 'report'])->name('orangtua.report');
    Route::get('/orangtua/payment', [OrtuController::class, 'payment'])->name('orangtua.payment');
});

// Route::get('/guru', [AdminController::class, 'guru'])->middleware('checkRole:guru');
// Route::get('/orangtua', [AdminController::class, 'orangtua'])->middleware('checkRole:orangtua');

// Route::get('/logout', [SessionController::class, 'logout']);

// logout
// Route::middleware(['web'])->group(function () {
//     Route::get('/logout', [SessionController::class, 'logout'])->name('logout');
// });

Route::post('/logout', function () {
    Auth::logout();
    return redirect('');
})->name('logout');