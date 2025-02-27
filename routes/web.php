<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AbsensiController;

// Route untuk menampilkan halaman scan QR Code
Route::get('/scan-qr-code', [AbsensiController::class, 'scanQrCode'])->name('scanQrCode');

Route::post('/store-scanned-data', [AbsensiController::class, 'storeScannedData']);

Route::post('/absensi/store-scanned-data', [AbsensiController::class, 'storeScannedData'])->name('absensi.storeScannedData');


// Route untuk generate QR Code
Route::post('/generate-qr-code', [AbsensiController::class, 'generateQrCode'])->name('generateQrCode');

// Route untuk menampilkan form absensi bagi user
Route::get('/absensi-form', [AbsensiController::class, 'create'])->name('absensi.create');

// Route untuk menyimpan data absensi dari form
Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');

// Route untuk menampilkan daftar absensi bagi admin
Route::get('/absensi', [AbsensiController::class, 'index'])->middleware(['auth', 'admin'])->name('absensi.index');

Route::delete('/karyawan/{karyawan}', [KaryawanController::class, 'destroy'])->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


Route::get('/history/day', [ActivityLogController::class, 'showHistory'])->name('history.day');
Route::get('/', function () {
    return view('landing');
});
Route::get('/user', function () {
    return view('user');
})->name('user');
Route::get('/table', function () {
    return view('table');
})->name('table');
Route::get('/map', function () {
    return view('map');
})->name('map');
Route::get('/form', function () {
    return view('form');
})->name('form');

// Di dalam routes/web.php


Route::resource('karyawan' , KaryawanController::class);
Route::resource('shift' , ShiftController::class);
Route::resource('jabatan' , JabatanController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'admin'])->name('dashboard');
Route::middleware('auth')->group(function () {
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// routes/web.php

Route::middleware('auth')->get('/activity-log', [ActivityLogController::class, 'index'])->name('activity-log');

require __DIR__.'/auth.php';
