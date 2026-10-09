<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Petugas\ItemController;
use App\Http\Controllers\Siswa\BorrowingController;
use App\Http\Controllers\Petugas\ApprovalController;

// Halaman Utama / Pemilihan Role
Route::get('/', function () {
    return view('auth.role-selection');
})->name('login');

// Halaman Login (Form)
Route::get('/login/siswa', function () {
    return view('auth.login-siswa');
})->name('login.siswa');

Route::get('/login/petugas', function () {
    return view('auth.login-petugas');
})->name('login.petugas');

// AREA SISWA
Route::get('/siswa/beranda', function () {
    return view('siswa.beranda');
})->name('siswa.beranda');

Route::get('/siswa/katalog', function () {
    return view('siswa.katalog');
})->name('siswa.katalog');

// --- RUTE PEMINJAMAN SISWA (Terhubung ke BorrowingController) ---
// --- RUTE PEMINJAMAN SISWA (Terhubung ke BorrowingController) ---
Route::get('/siswa/peminjaman', [BorrowingController::class, 'index'])->name('siswa.peminjaman');
Route::get('/siswa/peminjaman/tambah', [BorrowingController::class, 'create'])->name('siswa.peminjaman.create');
Route::post('/siswa/peminjaman', [BorrowingController::class, 'store'])->name('siswa.peminjaman.store');
// -------------------------------------------------------------
// -------------------------------------------------------------

// AREA PETUGAS
Route::get('/petugas/dashboard', function () {
    return view('petugas.dashboard');
})->name('petugas.dashboard');

// --- RUTE CRUD INVENTARIS (Terhubung ke ItemController) ---
Route::get('/petugas/inventaris', [ItemController::class, 'index'])->name('petugas.inventaris.index');
Route::get('/petugas/inventaris/create', [ItemController::class, 'create'])->name('petugas.inventaris.create');
Route::post('/petugas/inventaris', [ItemController::class, 'store'])->name('petugas.inventaris.store');
Route::get('/petugas/inventaris/{item}/edit', [ItemController::class, 'edit'])->name('petugas.inventaris.edit');
Route::put('/petugas/inventaris/{item}', [ItemController::class, 'update'])->name('petugas.inventaris.update');
Route::delete('/petugas/inventaris/{item}', [ItemController::class, 'destroy'])->name('petugas.inventaris.destroy');
// -----------------------------------------------------------

// --- RUTE APPROVAL PETUGAS (Terhubung ke ApprovalController) ---
Route::get('/petugas/persetujuan', [ApprovalController::class, 'index'])->name('petugas.persetujuan');
Route::put('/petugas/persetujuan/{id}', [ApprovalController::class, 'updateStatus'])->name('petugas.persetujuan.update');
// -------------------------------------------------------------

Route::get('/petugas/pengembalian', function () {
    return view('petugas.pengembalian');
})->name('petugas.pengembalian');

Route::get('/petugas/laporan', function () {
    return view('petugas.laporan');
})->name('petugas.laporan');