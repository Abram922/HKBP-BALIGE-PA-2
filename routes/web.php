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
Route::get('/guestshowberita/{guestberita}', [GuestBeritaController::class, 'show']);
Route::resource('guestaula', AulaGuestController::class);

Route::get('/', [NormalController::class, 'jadwalIbadah']);
//GUEST TENTANG
Route::get('/tingting', [NormalController::class, 'indexting']);
Route::get('/jadwalIbadah', [NormalController::class, 'indexjadwalIbadah']);
//GUEST KOINONIA
Route::get('/remajaa', [NormalController::class, 'indexremaja']);
Route::get('/sekolahminggu', [NormalController::class, 'indexsekolahminggu']);
Route::get('/naposoo', [NormalController::class, 'indexnaposo']);
Route::get('/parompuann', [NormalController::class, 'indexparompuan']);
Route::get('/punguanama', [NormalController::class, 'indexpunguanama']);
Route::get('/lansia', [NormalController::class, 'indexlansia']);
//GUEST MARTURIA
Route::get('/musikk', [NormalController::class, 'indexmusik']);
Route::get('/sendingg', [NormalController::class, 'indexsending']);




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

//GUEST KOINONIA
Route::get('/remajaa', [UserKoinoniaController::class, 'userremaja']);
Route::get('/remaja/{remaja}', [UserKoinoniaController::class, 'showremaja']);

Route::get('/sekolahminggu', [UserKoinoniaController::class, 'usersekolahminggu']);
Route::get('/sekolahminggu/{sekolah}', [UserKoinoniaController::class, 'showsekolahminggu']);

Route::get('/naposoo', [UserKoinoniaController::class, 'usernaposo']);
Route::get('/naposoo/{naposo}', [UserKoinoniaController::class, 'shownaposo']);

Route::get('/parompuann', [UserKoinoniaController::class, 'userparompuan']);
Route::get('/parompuann/{parompuan}', [UserKoinoniaController::class, 'showparompuan']);

Route::get('/punguanama', [UserKoinoniaController::class, 'userpunguan']);
Route::get('/punguanama/{punguan}', [UserKoinoniaController::class, 'showpunguan']);

Route::get('/lansia', [UserKoinoniaController::class, 'userlansia']);
Route::get('/lansia/{lanjut}', [UserKoinoniaController::class, 'showlansia']);

//GUEST MARTURIA
Route::get('/musikk', [UserKoinoniaController::class, 'usermusik']);
Route::get('/musikk/{musik}', [UserKoinoniaController::class, 'showmusik']);

Route::get('/sendingg', [UserKoinoniaController::class, 'usersending']);
Route::get('/sendingg/{sending}', [UserKoinoniaController::class, 'showsending']);

//GUEST DIAKONIA
Route::get('/sosiall', [UserKoinoniaController::class, 'usersosial']);
Route::get('/sosiall/{sosial}', [UserKoinoniaController::class, 'showsosial']);

Route::get('/masyarakatt', [UserKoinoniaController::class, 'usermasyarakat']);
Route::get('/masyarakatt/{masyarakat}', [UserKoinoniaController::class, 'showmasyarakat']);

Route::get('/kesehatann', [UserKoinoniaController::class, 'userkesehatan']);
Route::get('/kesehatann/{kesehatan}', [UserKoinoniaController::class, 'showkesehatan']);

Route::get('/pendidikann', [UserKoinoniaController::class, 'userpendidikan']);
Route::get('/pendidikann/{pendidikan}', [UserKoinoniaController::class, 'showpendidikan']);


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
