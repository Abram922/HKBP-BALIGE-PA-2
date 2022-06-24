<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ting;
use App\Models\JadwalIbadah;
use App\Models\Parhalado;

class NormalController extends Controller
{
    public function index()
    {
        return view('.guest.index');
    }

    public function jadwalIbadah()
    {
        $jadwalIbadah  = JadwalIbadah::paginate(20);
        $tingg  = Ting::paginate(20);
        return view('.guest.index', [
            'jadwalIbadah' => $jadwalIbadah,
            'ting'=>$tingg
        ]);
        // ['ting'=>$tingg]);
        }

    public function indexparhalado() {
        $parhalado = Parhalado::paginate(12);
        return view('guest.tentang.parhalado', [
            'parhalados' => $parhalado
        ]);
    }
    //TING TING
    public function indexting()
    {
        $ting  = Ting::paginate(20);
        return view('.guest.tentang.tingting',['ting'=>$ting]);
    }

    public function indexjadwalIbadah()
    {
        $jadwalIbadah  = JadwalIbadah::paginate(20);
        return view('.guest.tentang.jadwalIbadah', ['jadwalIbadah' => $jadwalIbadah ]);
    }

    //KOINONIA
    public function indexremaja()
    {
        return view('.guest.koinonia.remaja');
    }

    public function indexlansia()
    {
        return view('.guest.koinonia.lansia');
    }

    public function indexnaposo()
    {
        return view('.guest.koinonia.naposo');
    }

    public function indexparompuan()
    {
        return view('.guest.koinonia.parompuan');
    }
    
    public function indexpunguanama()
    {
        return view('.guest.koinonia.punguanama');
    }

    public function indexsekolahminggu()
    {
        return view('.guest.koinonia.sekolahminggu');
    }


    //MARTURIA
    public function indexsending()
    {
        return view('.guest.marturia.sending');
    }

    public function indexmusik()
    {
        return view('.guest.marturia.musik');
    }

    //DIAKONIA
    public function indexsosial()
    {
        return view('.guest.diakonia.sosial');
    }

    public function indexmasyarakat()
    {
        return view('.guest.diakonia.masyarakat');
    }
   
    public function indexkesehatan()
    {
        return view('.guest.diakonia.kesehatan');
    }

    public function indexpendidikan()
    {
        return view('.guest.diakonia.pendidikan');
    }

    
}
