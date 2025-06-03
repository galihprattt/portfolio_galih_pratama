<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\ProyekController;
use App\Http\Controllers\Admin\TentangController;
use App\Http\Controllers\Admin\KontakController as AdminKontakController;
use App\Http\Controllers\KontakController as PublicKontakController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController; // ← Alias benar

// ========================
// Halaman Publik
// ========================
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/tentang', [PublicController::class, 'tentang'])->name('tentang');
Route::get('/proyek', [PublicController::class, 'proyek'])->name('proyek');
Route::get('/kontak', [PublicKontakController::class, 'index'])->name('kontak');

// ========================
// Dashboard (auth)
// ========================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ========================
// Authenticated User Routes
// ========================
Route::middleware('auth')->group(function () {
    // Profil User
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ========================
// Admin Dashboard
// ========================
Route::get('/admin', [ProyekController::class, 'dashboard'])->name('admin.dashboard');

// ========================
// Grup Route untuk Admin
// ========================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // CRUD Proyek dengan resource
    Route::resource('projects', ProjectController::class);

    // Proyek manual
    Route::get('/proyek', [ProyekController::class, 'index'])->name('proyek.index');
    Route::get('/proyek/create', [ProyekController::class, 'create'])->name('proyek.create');
    Route::post('/proyek', [ProyekController::class, 'store'])->name('proyek.store');
    Route::get('/proyek/{proyek}/edit', [ProyekController::class, 'edit'])->name('proyek.edit');
    Route::put('/proyek/{proyek}', [ProyekController::class, 'update'])->name('proyek.update');
    Route::delete('/proyek/{proyek}', [ProyekController::class, 'destroy'])->name('proyek.destroy');

    // Tentang
    Route::get('/tentang/edit', [TentangController::class, 'edit'])->name('tentang.edit');
    Route::put('/tentang/update', [TentangController::class, 'update'])->name('tentang.update');

    // Kontak
    Route::get('/kontak/edit', [AdminKontakController::class, 'edit'])->name('kontak.edit');
    Route::put('/kontak/update', [AdminKontakController::class, 'update'])->name('kontak.update');

    // Home (menggunakan alias controller yang benar)
    Route::get('/home/edit', [AdminHomeController::class, 'edit'])->name('home.edit');
    Route::put('/home/update', [AdminHomeController::class, 'update'])->name('home.update');
});

// ========================
// Auth Routes
// ========================
require __DIR__.'/auth.php';
