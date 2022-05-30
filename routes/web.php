<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\SosialController;
use App\Http\Controllers\KesehatanController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\SendingController;
use App\Http\Controllers\MusikController;
use App\Http\Controllers\RemajaController;
use App\Http\Controllers\JadwalIbadahController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\NaposoController;
use App\Http\Controllers\ParompuanController;
use App\Http\Controllers\PunguanController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\LanjutController;
use App\Http\Controllers\TingController;
use App\Http\Controllers\AutentikasiController;
use App\Http\Controllers\UserBeritaController;
use App\Http\Controllers\NormalController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\AdminAulaController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AdminBeritaController;
use App\Http\Controllers\Guest\GuestBeritaController;
use App\Http\Controllers\Guest\AulaGuestController;



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

//GUEST
Route::get('/', [NormalController::class, 'index']);
Route::resource('guestberita', GuestBeritaController::class);
Route::get('/author/{user}', [GuestBeritaController::class, 'authorpost']);
Route::get('/guestshowberita/{berita}', [GuestBeritaController::class, 'show']);
Route::resource('guestaula', AulaGuestController::class);





//MARTURIA REMAJA
Route::resource('remaja', RemajaController::class);

//MARTURIA SEKOLAH MINGGU
Route::resource('sekolah', SekolahController::class);

//MARTURIA NAPOSO
Route::resource('naposo', NaposoController::class);

//MARTURIA PAROMPUAN
Route::resource('parompuan', ParompuanController::class);

//MARTURIA PUNGUAN AMA
Route::resource('punguan', PunguanController::class);

//MARTURIA LANSIA
Route::resource('lanjut', LanjutController::class);


//TENTANG JADWAL IBADAH
Route::get('/jadwalibadah', [JadwalIbadahController::class, 'lihatData']);
Route::post('/tentang/tambahJadwal', [JadwalIbadahController::class, 'tambah']);
Route::get('/tentang/tambahJadwal', [JadwalIbadahController::class, 'create']);
Route::get('/tentang/editJadwal/{id}', [JadwalIbadahController::class, 'edit']);
Route::get('/tentang/editJadwal', [JadwalIbadahController::class, 'update']);
Route::post('/tentang/editJadwal', [JadwalIbadahController::class, 'ubah']);
Route::get('/tentang/hapus/{id}', [JadwalIbadahController::class, 'hapus']);

//TENTANG TINGTING
Route::resource('ting', TingController::class);




Route::get('/login', [AutentikasiController::class, 'login']);
Route::post('/login', [AutentikasiController::class, 'authenticate']);
Route::get('/daftar', [AutentikasiController::class, 'daftar']);
Route::post('/daftar', [AutentikasiController::class, 'store']);

Route::get('/berita', [UserBeritaController::class, 'index']);
Route::get('/berita/{berita}', [UserBeritaController::class, 'show']);
Route::get('/authors/{user}', [UserBeritaController::class, 'authorpost']);



/*

1 pendeta
2 bph
3 user terdaftar
*/
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['Auth_Check:1']], function () {
        Route::get('/dash_pendeta', [AutentikasiController::class, 'dash_p']);
        Route::post('/logout', [AutentikasiController::class, 'logout']);
        Route::resource('user', AkunController::class);
        Route::get('akun/edit', [AkunController::class, 'editprofile']);
        Route::get('/dash_pendeta', [AutentikasiController::class, 'dash_p']);
        Route::get('/berita-admin', [AdminBeritaController::class, 'index']);
        Route::get('/berita-admin/create', [AdminBeritaController::class, 'create']);
        Route::post('/berita-admin/store', [AdminBeritaController::class, 'store']);
        Route::get('/berita-admin/edit/{adminberita}', [AdminBeritaController::class, 'edit']);
        Route::get('/berita-admin/show/{adminberita}', [AdminBeritaController::class, 'show']);
        Route::put('/berita-admin/update/{adminberita}', [AdminBeritaController::class, 'update']);
        Route::delete('/berita-admin/delete/{adminberita}', [AdminBeritaController::class, 'destroy']);
    });
    Route::group(['middleware' => ['Auth_Check:2']], function () {
        Route::get('/dash_bph', [AutentikasiController::class, 'dash_b']);
        Route::post('/logout', [AutentikasiController::class, 'logout']);
        //BERITA
        Route::resource('beritas', BeritaController::class);
        //DIAKONIA SOSIAL
        Route::resource('sosial', SosialController::class);
        //DIAKONIA KESEHATAN
        Route::resource('kesehatan', KesehatanController::class);
        //DIAKONIA MASYARAKAT
        Route::resource('masyarakat', MasyarakatController::class);
        //DIAKONIA PENDIDIKAN
        Route::resource('pendidikan', PendidikanController::class);
        //KOINONIA SENDING
        Route::resource('sending', SendingController::class);
        //KOINONIA MUSIK
        Route::resource('musik', MusikController::class);
        //Aula
        Route::resource('adminaula', AdminAulaController::class);
        Route::put('/aula/cancel-admin/{id}', [AdminAulaController::class, 'cancelOrderAdmin']);
        Route::put('/aula/approve-admin/{id}', [AdminAulaController::class, 'approveOrderAdmin']);
        // akun
    });
    Route::group(['middleware' => ['Auth_Check:3']], function () {
        Route::get('/dash_user', [AutentikasiController::class, 'dash_u']);
        Route::post('/logout', [AutentikasiController::class, 'logout']);
        Route::resource('aula', AulaController::class);
        Route::resource('userberita', UserBeritaController::class);
        Route::get('/authors/{user}', [UserBeritaController::class, 'authorpost']);
        Route::put('/aula/cancel/{id}', [AulaController::class, 'cancelOrder']);
        // akun
    });
});
