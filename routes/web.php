<?php

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SppController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembayaranController;


Route::get('/', function () {
    return view('home');
});

Route::get('siswa', [SiswaController::class, 'index']);
Route::get('siswa/tambah', [SiswaController::class, 'create']);
Route::post('siswa/tambah', [SiswaController::class, 'store']);
Route::get('siswa/update/{id}', [SiswaController::class, 'edit']);
Route::post('siswa/update/{id}', [SiswaController::class, 'update']);
Route::get('siswa/hapus/{id}', [SiswaController::class, 'hapus']);
Route::post('siswa/hapus/{id}', [SiswaController::class, 'destroy']);

Route::resource('spp', SppController::class);



Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
Route::post('/pembayaran/{id}', [PembayaranController::class, 'bayar'])->name('pembayaran.bayar');

Route::get('/pembayaran/history', [PembayaranController::class, 'history'])->name('pembayaran.history');

Route::get('/pembayaran/cetak/{id}', [PembayaranController::class, 'cetakBukti'])->name('pembayaran.cetak');
