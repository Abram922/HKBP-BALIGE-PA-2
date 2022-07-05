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
use App\Http\Controllers\TanggalController;
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
use App\Http\Controllers\ParhaladoController;
use App\Http\Controllers\ParhaladoControllerLogin;
use App\Http\Controllers\TingtingControllerLogin;
use App\Http\Controllers\UserKoinoniaController;
use App\Http\Controllers\Guest\UserGuestController;
use App\Http\Controllers\AfterLoginController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\Pendeta\PendetaJadwalIbadahController;
use App\Http\Controllers\Pendeta\PendetaParhaladoController;
use App\Http\Controllers\Pendeta\PendetaTingTingController;
use App\Http\Controllers\Pendeta\PendetaMusikController;
use App\Http\Controllers\Pendeta\PendetaSendingController;
use App\Http\Controllers\Pendeta\PendetaParompuanController;
use App\Http\Controllers\Pendeta\PendetaLansiaController;
use App\Http\Controllers\Pendeta\PendetaPunguanController;
use App\Http\Controllers\Pendeta\PendetaPendidikanController;
use App\Http\Controllers\Pendeta\PendetaKesehatanController;
use App\Http\Controllers\Pendeta\PendetaMasyarakatController;
use App\Http\Controllers\Pendeta\PendetaNaposoBulungController;
use App\Http\Controllers\Pendeta\PendetaRemajaController;
use App\Http\Controllers\Pendeta\PendetaSekolahMingguController;
use App\Http\Controllers\Pendeta\PendetaSosialController;
use App\Http\Controllers\Pendeta\PendetaTanggalController;



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
Route::get('/gberita', [GuestBeritaController::class, 'index']);
Route::get('/author/{user}', [GuestBeritaController::class, 'authorpost']);
Route::get('/guestshowberita/{guestberita}', [GuestBeritaController::class, 'show']);
Route::resource('guestaula', AulaGuestController::class);

// Route::get('/', [NormalController::class, 'jadwalIbadah']);
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

// PARHALADO FRONT
Route::get('/parhalado', [NormalController::class, 'indexparhalado']);

// PARHALADO FRONT
Route::get('/tanggall', [NormalController::class, 'indextanggal']);

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

Route::resource('tanggalpenting', TanggalController::class);


//TENTANG JADWAL IBADAH
Route::get('/jadwalibadah', [JadwalIbadahController::class, 'lihatData']);
Route::post('/tentang/tambahJadwal', [JadwalIbadahController::class, 'tambah']);
Route::get('/tentang/tambahJadwal', [JadwalIbadahController::class, 'create']);
Route::get('/tentang/editJadwal/{id}', [JadwalIbadahController::class, 'edit']);
Route::get('/tentang/editJadwal', [JadwalIbadahController::class, 'update']);
Route::post('/tentang/editJadwal', [JadwalIbadahController::class, 'ubah']);
Route::get('/tentang/hapus/{id}', [JadwalIbadahController::class, 'hapus']);

//TENTANG TINGTING






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

Route::get('/daftar-gedung-guest', [GedungController::class, 'daftargedung2']);
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
        Route::get('/detailpemesanan/{detail}', [AulaController::class, 'detailpemesanan']);

        Route::resource('pendetaremaja', PendetaRemajaController::class);

        //MARTURIA SEKOLAH MINGGU
        Route::resource('pendetasekolah', PendetaSekolahMingguController::class);

        //MARTURIA NAPOSO
        Route::resource('pendetanaposo', PendetaNaposoBulungController::class);

        // Pendeta jadwal ibadah

        Route::get('/pendetajadwalibadah', [PendetaJadwalIbadahController::class, 'index']);
        Route::post('/pendeta/tambahJadwal', [PendetaJadwalIbadahController::class, 'tambah']);
        Route::get('/pendeta/tambahJadwal', [PendetaJadwalIbadahController::class, 'create']);
        Route::get('/pendeta/editJadwal/{id}', [PendetaJadwalIbadahController::class, 'edit']);
        Route::get('/pendeta/editJadwal', [PendetaJadwalIbadahController::class, 'update']);
        Route::post('/pendeta/editJadwal', [PendetaJadwalIbadahController::class, 'ubah']);
        Route::get('/pendeta/hapus/{id}', [PendetaJadwalIbadahController::class, 'hapus']);

        Route::resource('PendetaTingting', PendetaTingTingController::class);
        // Route::resource('PendetaJadwal', PendetaJadwalIbadahController::class);
        Route::resource('PendetaParhalado', PendetaParhaladoController::class);
        //DIAKONIA SOSIAL
        Route::resource('pendetasosial', PendetaSosialController::class);
        //DIAKONIA KESEHATAN
        Route::resource('pendetakesehatan', PendetaKesehatanController::class);
        //DIAKONIA MASYARAKAT
        Route::resource('pendetamasyarakat', PendetaMasyarakatController::class);
        //DIAKONIA PENDIDIKAN
        Route::resource('pendetapendidikan', PendetaPendidikanController::class);

        //MARTURIA MUSIK
        Route::resource('pendetamusik', PendetaMusikController::class);
        //MARTURIA MUSIK
        Route::resource('pendetasending', PendetaSendingController::class);

        //KOINONIA LANJUT
        Route::resource('pendetalanjut', PendetaLansiaController::class);
        //KOINONIA PUNGUAN
        Route::resource('pendetapunguan', PendetaPunguanController::class);
        //KOINONIA PAROMPUAN
        Route::resource('pendetaparompuan', PendetaParompuanController::class);

        Route::resource('pendetatanggal', PendetaTanggalController::class);
    });
    Route::group(['middleware' => ['Auth_Check:2']], function () {
        Route::get('/dash_bph', [AutentikasiController::class, 'dash_b']);
        Route::post('/logout', [AutentikasiController::class, 'logout']);
        //BERITA
        Route::resource('beritas', BeritaController::class);
        // admin parhalado
        Route::resource('parhalados', ParhaladoController::class);
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

        Route::resource('tanggal', TanggalController::class);

        Route::resource('ting', TingController::class);
        //Aula
        Route::resource('adminaula', AdminAulaController::class);
        Route::get('/adminaulac', [AdminAulaController::class, 'index2']);
        Route::put('/aula/cancel-admin/{id}', [AdminAulaController::class, 'cancelOrderAdmin']);
        Route::put('/aula/approve-admin/{id}', [AdminAulaController::class, 'approveOrderAdmin']);
        Route::put('/aula/lunas/{id}', [AdminAulaController::class, 'lunas']);
        Route::put('/aula/konfirmasi6/{id}', [AdminAulaController::class, 'konfirmasipembayaranpertama']);
        Route::put('/aula/declinebukti/{id}', [AdminAulaController::class, 'tolakbuktipembayaran']);
        Route::put('/aula/declinebuktidp/{id}', [AdminAulaController::class, 'tolakbuktipembayaranpertama']);
        Route::put('/aula/konfirmasipelunasanakhir/{id}', [AdminAulaController::class, 'approvebuktipembayaranakhir']);
        Route::put('/aula/declinepelunasanakhir/{id}', [AdminAulaController::class, 'tolakbuktipembayaranakhir']);

        // Gedung
        Route::resource('gedung', GedungController::class);
    });
    Route::group(['middleware' => ['Auth_Check:3']], function () {
        Route::get('/dash_user', [AutentikasiController::class, 'dash_u']);
        Route::post('/logout', [AutentikasiController::class, 'logout']);
        Route::resource('aula', AulaController::class);
        Route::resource('userberita', UserBeritaController::class);
        Route::get('/authors/{user}', [UserBeritaController::class, 'authorpost']);
        Route::put('/aula/cancel/{id}', [AulaController::class, 'cancelOrder']);
        Route::get('/parhaladologin', [ParhaladoControllerLogin::class, 'index']);

        // akun
        //GUEST TENTANG
        Route::get('/usertingting', [UserGuestController::class, 'indexting']);
        Route::get('/usertanggal', [UserGuestController::class, 'indextanggal']);
        Route::get('/userjadwalIbadah', [UserGuestController::class, 'indexjadwalIbadah']);

        //GUEST MARTURIA
        Route::get('/usermusikk', [UserGuestController::class, 'usermusik']);
        Route::get('/usermusikk/{musik}', [UserGuestController::class, 'showmusik']);

        Route::get('/usersendingg', [UserGuestController::class, 'usersending']);
        Route::get('/usersendingg/{sending}', [UserGuestController::class, 'showsending']);

        //GUEST DIAKONIA
        Route::get('/usersosiall', [UserGuestController::class, 'usersosial']);
        Route::get('/usersosiall/{sosial}', [UserGuestController::class, 'showsosial']);

        Route::get('/usermasyarakatt', [UserGuestController::class, 'usermasyarakat']);
        Route::get('/usermasyarakatt/{masyarakat}', [UserGuestController::class, 'showmasyarakat']);

        Route::get('/userkesehatann', [UserGuestController::class, 'userkesehatan']);
        Route::get('/userkesehatann/{kesehatan}', [UserGuestController::class, 'showkesehatan']);

        Route::get('/userpendidikann', [UserGuestController::class, 'userpendidikan']);
        Route::get('user/pendidikann/{pendidikan}', [UserGuestController::class, 'showpendidikan']);

        //GUEST LOGIN KOINONIA
        Route::get('/userremajaa', [AfterLoginController::class, 'indexremaja']);
        Route::get('/usersekolahminggu', [AfterLoginController::class, 'indexsekolahminggu']);
        Route::get('/usernaposoo', [AfterLoginController::class, 'indexnaposo']);
        Route::get('/userparompuann', [AfterLoginController::class, 'indexparompuan']);
        Route::get('/userpunguanama', [AfterLoginController::class, 'indexpunguanama']);
        Route::get('/userlansia', [AfterLoginController::class, 'indexlansia']);
        Route::get('/daftar-gedung', [GedungController::class, 'daftargedung']);
  
        Route::post('/kirim', [AulaController::class, 'kirim']);
        Route::get('/invoice/{aula}', [AulaController::class, 'buktipembayaran']);
        Route::get('/pesan/{gedung}', [AulaController::class, 'tambah']);
        Route::resource('storebukti', BuktiPembayaranAula::class);

        //Route::put('/berita-admin/update/{adminberita}', [AdminBeritaController::class, 'update']);
        Route::put('/buktipembayaran/{aula}', [AulaController::class, 'storebukti']);
        Route::get('/buktipembayaransisa/{aula}', [AulaController::class, 'buktipelunasansisa']);
        Route::put('/storepembayaransisa/{aula}', [AulaController::class, 'storebuktipelunasan']);
    });
});
