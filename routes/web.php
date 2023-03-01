<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\SppController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\Petugas\PembayaranPetugasController;
use App\Http\Controllers\HistoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('siswa', [SiswaController::class, 'index']);
    Route::post('siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::post('siswa/tambah', [SiswaController::class, 'store'])->name('siswa.tambah');
    Route::get('siswa/delete/{id}', [SiswaController::class, 'destroy'])->name('siswa.delete');

    Route::get('petugas', [PetugasController::class, 'index']);
    Route::post('petugas/update/{id}', [PetugasController::class, 'update'])->name('petugas.update');
    Route::post('petugas/tambah', [PetugasController::class, 'store'])->name('petugas.tambah');
    Route::get('petugas/delete/{id}', [PetugasController::class, 'destroy'])->name('petugas.delete');

    Route::get('kelas', [KelasController::class, 'index']);
    Route::post('kelas/tambah', [KelasController::class, 'store'])->name('kelas.tambah');
    Route::post('kelas/update/{id}', [KelasController::class, 'update'])->name('kelas.update');
    Route::get('kelas/delete/{id}', [KelasController::class, 'destroy'])->name('kelas.delete');

    Route::get('spp', [SppController::class, 'index']);
    Route::post('spp/tambah', [SppController::class, 'store'])->name('spp.tambah');
    Route::post('spp/update/{id}', [SppController::class, 'update'])->name('spp.update');
    Route::get('spp/delete/{id}', [SppController::class, 'destroy'])->name('spp.delete');

    Route::get('pembayaran', [PembayaranController::class, 'index'])->name('petugas.view');
    Route::get('pembayaran/detail/{id}', [PembayaranController::class, 'show'])->name('pembayaran.detail');
    Route::post('pembayaran/tambah/{id}', [PembayaranController::class, 'store'])->name('pembayaran.tambah');
    Route::get('pembayaran/delete/{id}', [PembayaranController::class, 'destroy'])->name('pembayaran.delete');


    Route::get('siswa/history/pembayaran', [HistoryController::class, 'index'])->name('siswa.history.pembayaran');


    Route::get('petugas/pembayaran', [PembayaranPetugasController::class, 'index'])->name('pembayaran.petugas.view');
    Route::get('petugas/pembayaran/detail/{id}', [PembayaranPetugasController::class, 'show'])->name('pembayaran.petugas.detail');
    Route::post('petugas/pembayaran/tambah/{id}', [PembayaranPetugasController::class, 'store'])->name('pembayaran.petugas.tambah');
    Route::get('petugas/pembayaran/delete/{id}', [PembayaranPetugasController::class, 'destroy'])->name('pembayaran.petugas.delete');

    Route::get('/pembayaran/detail/cetak/{id}', [PembayaranController::class, 'cetak'])->name('pembayaran.cetak');



})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
