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
Route::get('bacaSemua',function() {
    auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('bacaSemua');
Route::get('/markasread/{id}', [App\Http\Controllers\HomeController::class, 'markasread'])->name('markasread');
Route::get('/profile-anggota', [App\Http\Controllers\AnggotaController::class, 'profileAnggota']);
Route::get('/detail-kredit-saya/{id_kredit}', [App\Http\Controllers\KreditController::class, 'detailKreditSaya']);
Route::get('/simpanan-saya', [App\Http\Controllers\SimpananController::class, 'simpananPetugas']);
Route::get('/kredit-saya', [App\Http\Controllers\KreditController::class, 'kreditPetugas']);
Route::post('/simpan-kredit', [App\Http\Controllers\KreditController::class, 'simpanKredit'])->name('simpan.kredit');
Route::group(['middleware' => 'anggota'], function () {
    Route::get('/anggota', [App\Http\Controllers\AnggotaController::class, 'index']);
    Route::get('/kredit-anggota', [App\Http\Controllers\KreditController::class, 'kreditAnggota']);
    Route::get('/detail-kredit-anggota/{id_kredit}', [App\Http\Controllers\KreditController::class, 'detailKreditAnggota']);
    Route::get('/cetak-detail-kredit-anggota', [App\Http\Controllers\KreditController::class, 'cetakKredit']);
    Route::post('/simpan-kredit', [App\Http\Controllers\KreditController::class, 'simpanKredit'])->name('simpan.kredit');

    Route::get('/simpanan-anggota', [App\Http\Controllers\SimpananController::class, 'simpananAnggota']);
});

Route::group(['middleware' => 'bendahara'], function () {
    Route::get('/bendahara/simpanan-anggota', [App\Http\Controllers\SimpananController::class, 'indexBendahara']);
    
    Route::get('/bendahara/pengajuan-kredit-anggota', [App\Http\Controllers\KreditController::class, 'indexPengajuanBendahara']);
    Route::get('/bendahara/kredit-anggota', [App\Http\Controllers\KreditController::class, 'indexBendahara']);
    Route::get('/bendahara/approval-kredit/{id_kredit}', [App\Http\Controllers\KreditController::class, 'approval']);
    Route::post('/bendahara/update-kredit', [App\Http\Controllers\KreditController::class, 'updateKreditBendahara'])->name('update.kredit.bendahara');
    Route::post('/bendahara/update-status-kredit', [App\Http\Controllers\KreditController::class, 'updateStatusKredit'])->name('update.statusKredit.bendahara');
    Route::get('/bendahara/detail-kredit-anggota/{id_kredit}', [App\Http\Controllers\KreditController::class, 'detailKreditSaya']);
    
    Route::get('/bendahara/tambah-angsuran/{id_kredit}', [App\Http\Controllers\AngsuranController::class, 'tambahAngsuran']);
    Route::post('/bendahara/store-angsuran', [App\Http\Controllers\AngsuranController::class, 'storeAngsuran'])->name('store.angsuran');

    Route::get('/bendahara/statistik', [App\Http\Controllers\HomeController::class, 'statistik']);
   
});

Route::group(['middleware' => 'ketua'], function () {
    Route::get('/ketua/simpanan-anggota', [App\Http\Controllers\SimpananController::class, 'indexKetua']);
    Route::get('/ketua/pengajuan-kredit-anggota', [App\Http\Controllers\KreditController::class, 'indexPengajuanKetua']);
    Route::get('/ketua/kredit-anggota', [App\Http\Controllers\KreditController::class, 'indexKetua']);
    Route::get('/ketua/approval-kredit/{id_kredit}', [App\Http\Controllers\KreditController::class, 'approval']);
    Route::post('/ketua/update-kredit', [App\Http\Controllers\KreditController::class, 'updateKreditKetua'])->name('update.kredit.ketua');
    Route::get('/ketua/detail-kredit-anggota/{id_kredit}', [App\Http\Controllers\KreditController::class, 'detailKreditSaya']);

});

Route::group(['middleware' => 'pb'], function () {
    Route::get('/petugas-barang/pengajuan-kredit-anggota', [App\Http\Controllers\KreditController::class, 'indexPengajuanPetugas']);
    Route::get('/petugas-barang/kredit-anggota', [App\Http\Controllers\KreditController::class, 'indexPetugas']);
    Route::get('/petugas-barang/approval-kredit/{id_kredit}', [App\Http\Controllers\KreditController::class, 'approval']);
    Route::post('/petugas-barang/update-kredit', [App\Http\Controllers\KreditController::class, 'updateKreditPetugas'])->name('update.kredit.barang');
    Route::get('/petugas-barang/detail-kredit/{id_kredit}', [App\Http\Controllers\KreditController::class, 'detailKredit']);
    Route::post('/petugas-barang/update-status-kredit', [App\Http\Controllers\KreditController::class, 'updateStatusKredit'])->name('update.statusKredit.petugas');
    Route::get('/petugas-barang/detail-kredit-anggota/{id_kredit}', [App\Http\Controllers\KreditController::class, 'detailKreditSaya']);
    Route::post('/simpan-kredit-by-petugas-barang', [App\Http\Controllers\KreditController::class, 'simpanKreditByPetugas'])->name('simpan.kredit.byPetugas');

});

Route::group(['middleware' => 'pm'], function () {
    Route::get('/petugas-motor/pengajuan-kredit-anggota', [App\Http\Controllers\KreditController::class, 'indexPengajuanPetugas']);
    Route::get('/petugas-motor/kredit-anggota', [App\Http\Controllers\KreditController::class, 'indexPetugas']);
    Route::get('/petugas-motor/approval-kredit/{id_kredit}', [App\Http\Controllers\KreditController::class, 'approval']);
    Route::post('/petugas-motor/update-kredit', [App\Http\Controllers\KreditController::class, 'updateKreditPetugas'])->name('update.kredit.motor');
    Route::get('/petugas-motor/detail-kredit/{id_kredit}', [App\Http\Controllers\KreditController::class, 'detailKredit']);
    Route::get('/petugas-motor/detail-kredit-anggota/{id_kredit}', [App\Http\Controllers\KreditController::class, 'detailKreditSaya']);
    Route::post('/simpan-kredit-by-petugas-motor', [App\Http\Controllers\KreditController::class, 'simpanKreditByPetugas'])->name('simpan.kredit.byPetugas');

});

Route::group(['middleware' => 'pt'], function () {
    Route::get('/petugas-tunai/pengajuan-kredit-anggota', [App\Http\Controllers\KreditController::class, 'indexPengajuanPetugas']);
    Route::get('/petugas-tunai/kredit-anggota', [App\Http\Controllers\KreditController::class, 'indexPetugas']); 
    Route::get('/petugas-tunai/approval-kredit/{id_kredit}', [App\Http\Controllers\KreditController::class, 'approval']);
    Route::post('/petugas-tunai/update-kredit', [App\Http\Controllers\KreditController::class, 'updateKreditPetugas'])->name('update.kredit.tunai');
    Route::get('/petugas-tunai/detail-kredit/{id_kredit}', [App\Http\Controllers\KreditController::class, 'detailKredit']);
    Route::get('/petugas-tunai/detail-kredit-anggota/{id_kredit}', [App\Http\Controllers\KreditController::class, 'detailKreditSaya']);
    Route::post('/simpan-kredit-by-petugas-tunai', [App\Http\Controllers\KreditController::class, 'simpanKreditByPetugas'])->name('simpan.kredit.byPetugas');


});
