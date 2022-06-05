<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AfterLoginController extends Controller
{

    //KOINONIA
    public function indexremaja()
    {
        return view('.UserTerdaftar.koinonia.remaja');
    }

    public function indexlansia()
    {
        return view('.UserTerdaftar.koinonia.lansia');
    }

    public function indexnaposo()
    {
        return view('.UserTerdaftar.koinonia.naposo');
    }

    public function indexparompuan()
    {
        return view('.UserTerdaftar.koinonia.parompuan');
    }

    public function indexpunguanama()
    {
        return view('.UserTerdaftar.koinonia.punguanama');
    }

    public function indexsekolahminggu()
    {
        return view('.UserTerdaftar.koinonia.sekolahminggu');
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
