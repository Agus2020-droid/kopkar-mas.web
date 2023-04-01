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
Route::get('/shu-saya/{nik_ktp}', [App\Http\Controllers\ShuController::class, 'shuSaya']);
Route::get('/download-slip-shu/{id_shu}', [App\Http\Controllers\ShuController::class, 'downloadSlip']);
Route::post('/upload-image', [App\Http\Controllers\UserController::class, 'storePhoto'])->name('store.photo');
Route::get('/edit-password', [App\Http\Controllers\UserController::class, 'editPassword']);
Route::get('/anggota/edit-password', [App\Http\Controllers\UserController::class, 'editPasswordAnggota']);
Route::post('/update-password', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('update.password');
Route::post('/update-mode', [App\Http\Controllers\UserController::class, 'updateMode'])->name('update.mode');

Route::group(['middleware' => 'anggota'], function () {
    Route::get('/anggota', [App\Http\Controllers\AnggotaController::class, 'index']);
    Route::get('/kredit-anggota', [App\Http\Controllers\KreditController::class, 'kreditAnggota']);
    Route::get('/detail-kredit-anggota/{id_kredit}', [App\Http\Controllers\KreditController::class, 'detailKreditAnggota']);
    Route::get('/cetak-detail-kredit-anggota', [App\Http\Controllers\KreditController::class, 'cetakKredit']);

    Route::get('/simpanan-anggota', [App\Http\Controllers\SimpananController::class, 'simpananAnggota']);
    
    Route::get('/tutorial', [App\Http\Controllers\HomeController::class, 'indexTutorial']);
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
    Route::post('/bendahara/update-angsuran', [App\Http\Controllers\AngsuranController::class, 'updateAngsuran'])->name('update.angsuran');
    Route::post('/bendahara/store-angsuran', [App\Http\Controllers\AngsuranController::class, 'storeAngsuran'])->name('store.angsuran');
    Route::post('/bendahara/import-angsuran', [App\Http\Controllers\AngsuranController::class, 'importAngsuran'])->name('import.angsuran');

    Route::get('/bendahara/statistik', [App\Http\Controllers\HomeController::class, 'statistik']);
    
    Route::get('/bendahara/anggota', [App\Http\Controllers\AnggotaController::class, 'anggota']);
    Route::get('/bendahara/detail-anggota/{id}', [App\Http\Controllers\AnggotaController::class, 'detailAnggota']);
    
    Route::get('/bendahara/simpanan', [App\Http\Controllers\SimpananController::class, 'indexBendahara']);
    Route::post('/bendahara/simpan-transaksi', [App\Http\Controllers\SimpananController::class, 'storeSimpanan'])->name('store.simpanan');
    Route::get('/bendahara/detail-simpanan-anggota/{nik_ktp}', [App\Http\Controllers\SimpananController::class, 'detailSimpanan']);
    Route::get('/bendahara/edit-simpanan-anggota/{id_simpanan}', [App\Http\Controllers\SimpananController::class, 'editSimpanan']);
    Route::post('/bendahara/update-simpanan-anggota', [App\Http\Controllers\SimpananController::class, 'updateSimpanan'])->name('update.simpanan');
    Route::get('/bendahara/hapus-simpanan-anggota/{id_simpanan}', [App\Http\Controllers\SimpananController::class, 'hapusSimpanan']);
    Route::post('/bendahara/import-simpanan', [App\Http\Controllers\SimpananController::class, 'importSimpanan'])->name('import.simpanan');
    
    Route::get('/bendahara/sisa-hasil-usaha', [App\Http\Controllers\ShuController::class, 'indexBendahara']);
    Route::get('/bendahara/list-shu/{thn_buku}', [App\Http\Controllers\ShuController::class, 'listThn']);
    Route::get('/bendahara/detail-shu/{id_shu}', [App\Http\Controllers\ShuController::class, 'detailShu']);
    Route::post('/bendahara/import-shu', [App\Http\Controllers\ShuController::class, 'importShu'])->name('import.shu');
    Route::post('/bendahara/update-shu', [App\Http\Controllers\ShuController::class, 'updateShu'])->name('update.shu');

   
});

Route::group(['middleware' => 'ketua'], function () {
    Route::get('/ketua/simpanan-anggota', [App\Http\Controllers\SimpananController::class, 'indexKetua']);
    Route::get('/ketua/pengajuan-kredit-anggota', [App\Http\Controllers\KreditController::class, 'indexPengajuanKetua']);
    Route::get('/ketua/kredit-anggota', [App\Http\Controllers\KreditController::class, 'indexKetua']);
    Route::get('/ketua/approval-kredit/{id_kredit}', [App\Http\Controllers\KreditController::class, 'approval']);
    Route::post('/ketua/update-kredit', [App\Http\Controllers\KreditController::class, 'updateKreditKetua'])->name('update.kredit.ketua');
    Route::get('/ketua/detail-kredit-anggota/{id_kredit}', [App\Http\Controllers\KreditController::class, 'detailKreditSaya']);

    Route::get('/ketua/list-user', [App\Http\Controllers\UserController::class, 'listUser']);
    Route::post('/ketua/update-multi-kredit', [App\Http\Controllers\UserController::class, 'multiKredit'])->name('simpan.multikredit');

    Route::get('/ketua/statistik', [App\Http\Controllers\HomeController::class, 'statistik']);

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
    Route::get('/petugas-barang/cetak-akad/{id_kredit}', [App\Http\Controllers\KreditController::class, 'cetakAkadBarang']);

});

Route::group(['middleware' => 'pm'], function () {
    Route::get('/petugas-motor/pengajuan-kredit-anggota', [App\Http\Controllers\KreditController::class, 'indexPengajuanPetugas']);
    Route::get('/petugas-motor/kredit-anggota', [App\Http\Controllers\KreditController::class, 'indexPetugas']);
    Route::get('/petugas-motor/approval-kredit/{id_kredit}', [App\Http\Controllers\KreditController::class, 'approval']);
    Route::post('/petugas-motor/update-kredit', [App\Http\Controllers\KreditController::class, 'updateKreditPetugas'])->name('update.kredit.motor');
    Route::get('/petugas-motor/detail-kredit/{id_kredit}', [App\Http\Controllers\KreditController::class, 'detailKredit']);
    Route::get('/petugas-motor/detail-kredit-anggota/{id_kredit}', [App\Http\Controllers\KreditController::class, 'detailKreditSaya']);
    Route::post('/simpan-kredit-by-petugas-motor', [App\Http\Controllers\KreditController::class, 'simpanKreditByPetugas'])->name('simpan.kredit.byPetugas');
    Route::get('/petugas-motor/cetak-akad/{id_kredit}', [App\Http\Controllers\KreditController::class, 'cetakAkadMotor']);

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

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/list-user', [App\Http\Controllers\UserController::class, 'indexAdmin']);
    Route::post('/admin/hapus-user', [App\Http\Controllers\UserController::class, 'hapusAkun'])->name('hapus.akun');
});