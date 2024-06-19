<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\scan;
use App\Http\Controllers\C_dashboard;
use App\Http\Controllers\C_login;
use App\Http\Controllers\TbBarangController;
use App\Http\Controllers\TpaController;
use App\Http\Controllers\TrukController;
use App\Http\Controllers\TbUserController;
use App\Http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// LOGIN
Route::get('login', [C_login::class, 'index']);
Route::get('logout', [C_login::class, 'aksi_logout']);
Route::post('aksi_login', [C_login::class, 'aksi_login']);

Route::group(['middleware' => ['autentikasi']], function(){
    Route::get('scan', [scan::class, 'index']);
    Route::post('rubah_role', [c_user::class, 'rubah_role']);
    Route::get('/', [C_dashboard::class, 'index']);
});

// ROUTE SEKRETARIAT
Route::group(['middleware' => ['autentikasi']], function(){
    Route::get('barang', [TbBarangController::class, 'index']);
    Route::post('aksi_tambah_barang', [TbBarangController::class, 'tambah_barang']);
    Route::get('aksi_hapus_barang/{id}', [TbBarangController::class, 'hapus_barang']);
    Route::get('edit_barang/{id}', [TbBarangController::class, 'edit_barang']);
    Route::post('aksi_edit_barang', [TbBarangController::class, 'aksi_edit_barang']);
    Route::get('barang_masukan', [TbBarangController::class, 'barang_masukan']);
    Route::post('aksi_barang_keluar', [TbBarangController::class, 'aksi_barang_keluar']);
});

// ROUTE TPA
Route::group(['middleware' => ['autentikasi']], function(){
    Route::get('tpa', [TpaController::class, 'index']);
    Route::get('truk',[TrukController::class,'index']);
    Route::get('regis_truk',[TrukController::class,'regis_truk']);
    Route::post('aksi_regis_truk',[TrukController::class,'aksi_regis_truk']);
    Route::get('scan', [TpaController::class, 'scan']);
    Route::post('aksi_cek_token', [TpaController::class, 'aksi_cek_token']);
    Route::post('aksi_simpan_kedatangan_armada', [TpaController::class, 'aksi_simpan_kedatangan_armada']);
    Route::get('cetak_qr/{token}', [TpaController::class, 'cetak_qr']);
    Route::get('aktifkan_armada/{token}', [TpaController::class, 'aktifkan_armada']);
    Route::get('nonaktifkan_armada/{token}', [TpaController::class, 'nonaktifkan_armada']);
    Route::get('tangguhkan_armada/{token}', [TpaController::class, 'tangguhkan_armada']);
    Route::get('hapus_armada/{token}', [TpaController::class, 'hapus_armada']);
    Route::get('regis_armada', [TpaController::class, 'regis_armada']);
    Route::get('edit_armada/{token}', [TrukController::class, 'edit_armada']);
    Route::post('aksi_edit_armada',[TrukController::class,'aksi_edit_armada']);
    Route::post('aksi_tambah_armada',[TrukController::class,'aksi_regis_truk']);
    Route::get('riwayat_armada/{token}', [TrukController::class, 'riwayat_armada']);
    Route::post('aksi_tambah_keterangan',[TrukController::class,'aksi_tambah_keterangan']);
});

// ROUTE PENGGUNA
Route::group(['middleware' => ['autentikasi']], function(){
    Route::get('pengguna', [TbUserController::class, 'index']);
    Route::post('aksi_tambah_pengguna', [TbUserController::class, 'create']);
    Route::get('hapus_pengguna/{id}', [TbUserController::class, 'delete']);
});

// ROUTE LAPORAN
Route::group(['middleware' => ['autentikasi']], function(){
    Route::get('laporan', [LaporanController::class, 'index']);
    Route::post('aksi_cek_laporan', [LaporanController::class, 'aksi_cek_laporan']);
});