<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\DetailProyekController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuratController;




Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




Route::middleware(['auth'])->group(function () {
    Route::get('/', [ProyekController::class, 'index']);

    // Semua bisa lihat
    Route::get('/proyek', [ProyekController::class, 'index'])->name('proyek.index');
    Route::get('/proyeks/{proyek}/detail_proyek', [DetailProyekController::class, 'index'])->name('detail_proyek.index');

    Route::get('/surat', [SuratController::class, 'index'])->name('surat.index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});

// Hanya admin yang bisa kelola data
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('proyek', ProyekController::class)->except(['index', 'show']);
    Route::resource('tags', TagController::class);
    Route::resource('users', UserController::class);

    Route::get('/proyeks/{id_proyek}/detail_proyek/create', [DetailProyekController::class, 'create'])->name('detail_proyek.create');
    Route::post('/proyeks/{id_proyek}/detail_proyek', [DetailProyekController::class, 'store'])->name('detail_proyek.store');
    Route::get('/detail_proyek/{id_detail}/edit', [DetailProyekController::class, 'edit'])->name('detail_proyek.edit');
    Route::put('/detail_proyek/{id_detail}', [DetailProyekController::class, 'update'])->name('detail_proyek.update');
    Route::delete('/detail_proyek/{id_detail}', [DetailProyekController::class, 'destroy'])->name('detail_proyek.destroy');
});
