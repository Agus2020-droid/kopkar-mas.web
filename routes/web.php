<?php

use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     return view('v_welcome');
// });

Auth::routes();
Auth::routes(['verify' => true]);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'anggota'], function () {
    Route::get('/anggota', [App\Http\Controllers\AnggotaController::class, 'index']);
    Route::get('/profile-anggota', [App\Http\Controllers\AnggotaController::class, 'profileAnggota']);

    Route::get('/kredit-anggota', [App\Http\Controllers\KreditController::class, 'kreditAnggota']);
    Route::get('/detail-kredit-anggota', [App\Http\Controllers\KreditController::class, 'detailKreditAnggota']);
    Route::get('/cetak-detail-kredit-anggota', [App\Http\Controllers\KreditController::class, 'cetakKredit']);
    Route::post('/simpan-kredit', [App\Http\Controllers\KreditController::class, 'simpanKredit'])->name('simpan.kredit');

    Route::get('/simpanan-anggota', [App\Http\Controllers\SimpananController::class, 'simpananAnggota']);
});
