<?php

namespace App\Http\Controllers;

use App\Models\Lan;
use App\Models\Naposo;
use App\Models\Parompuan;
use App\Models\Punguan;
use App\Models\Remaja;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class AfterLoginController extends Controller
{

    //KOINONIA
    public function indexremaja()
    {
        $remaja = Remaja::paginate(20);
        return view('.UserTerdaftar.koinonia.remaja', [
            'remaja' => $remaja
        ]);
    }

    public function indexlansia()
    {
        $lanjut = Lan::paginate(20);
        return view('.UserTerdaftar.koinonia.lansia', [
            'lanjut' => $lanjut
        ]);
    }

    public function indexnaposo()
    {
        $naposo = Naposo::paginate(20);
        return view('.UserTerdaftar.koinonia.naposo', [
            'naposo' => $naposo
        ]);
    }

    public function indexparompuan()
    {
        $parompuan = Parompuan::paginate(20);
        return view('.UserTerdaftar.koinonia.parompuan', [
            'parompuan' => $parompuan
        ]);
    }

    public function indexpunguanama()
    {
        $punguan = Punguan::paginate(20);
        return view('.UserTerdaftar.koinonia.punguanama', [
            'punguan' => $punguan
        ]);
    }

    public function indexsekolahminggu()
    {
        $sekolah = Sekolah::paginate(20);
        return view('.UserTerdaftar.koinonia.sekolahminggu', [
            'sekolah' => $sekolah
        ]);
    }


    //MARTURIA
    public function indexsending()
    {
        return view('.UserTerdaftar.marturia.sending');
    }

    public function indexmusik()
    {
        return view('.UserTerdaftar.marturia.musik');
    }

    //DIAKONIA
    public function indexsosial()
    {
        return view('.UserTerdaftar.diakonia.sosial');
    }

    public function indexmasyarakat()
    {
        return view('.UserTerdaftar.diakonia.masyarakat');
    }

    public function indexkesehatan()
    {
        return view('.UserTerdaftar.diakonia.kesehatan');
    }

    public function indexpendidikan()
    {
        return view('.UserTerdaftar.diakonia.pendidikan');
    }
}
