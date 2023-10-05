<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JemaatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\KeputusanController;

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

Route::get('/', [DashboardController::class,'index'])->middleware('auth');

//JEMAAT
Route::get('/jemaat', [JemaatController::class,'index'])->middleware('auth');
Route::post('/jemaat/tambah', [JemaatController::class,'store'])->middleware('auth');
Route::post('/jemaat/{jemaat}/edit', [JemaatController::class,'update'])->middleware('auth');
Route::get('/jemaat/{jemaat}/delete', [JemaatController::class,'destroy'])->middleware('auth');
Route::get('/jemaat/cetak_qr/{id}',[JemaatController::class,'cetakQr'])->middleware('auth')->name('cetak_qr_code');
//END JEMAAT

//KEHADIRAN
Route::get('/kehadiran', [KehadiranController::class,'index'])->middleware('auth');
Route::post('/kehadiran/tambah', [KehadiranController::class,'store'])->middleware('auth');
Route::post('/kehadiran/kehadirant}/edit', [KehadiranController::class,'update'])->middleware('auth');
Route::get('/kehadiran/{kehadiran}/delete', [KehadiranController::class,'destroy'])->middleware('auth');
//END KEHADIRAN

//KEPUTUSAN
Route::get('/keputusan', [KeputusanController::class,'index'])->middleware('auth')->name('keputusan');

//END KEPUTUSAN


Route::get('/sign-in',[LoginController::class,'index'])->middleware('guest')->name('sign_in');
Route::post('/sign-in',[LoginController::class,'authenticate'])->name('sign_in_process');


// Route::get('/login', function () {
//     return view('auth.login');
// });

// Route::get('/beranda', function () {
//     return view('beranda');
// });

// Route::get('/kehadiran', function () {
//     return view('kehadiran');
// });

// Route::get('/jemaat', function () {
//     return view('jemaat');
//     /*
//     tambah jemaat, edit jemaat, hapus jemaat, show jemaat
//         > Nama, pekerjaan, status, usia, kehadiran, keaktifan, pendapatan, alamat
//     */
// });

// Route::get('/diakonia', function () {
//     return view('diakonia');
//     /*
//     tambah diakonia, edit diakonia, hapus diakonia, show diakonia
//         > Jenis Bantuan(barang, uang), jumlah/nilai
//     */
// });

// Route::get('/Daftar Penerima Diakonia', function () {
//     return view('daftar_penerima_diakonia');
//     /*
//         AMBIL DARI TABEL JEMAAT YANG MEMENUHI KRITERIA PENERIMA DIAKONIA
//         Kriteria : Pendapatan, Kehadiran, keaktifan, status(kawin)
//     */
// });



