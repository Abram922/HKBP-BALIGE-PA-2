<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AfterLoginController extends Controller
{

    //KOINONIA
    public function indexremaja()
    {
        return view('.userguest\koinonia\remaja');
    }

    public function indexlansia()
    {
        return view('.userguest\koinonia\lansia');
    }

    public function indexnaposo()
    {
        return view('.userguest\koinonia\naposo');
    }

    public function indexparompuan()
    {
        return view('.userguest\koinonia\parompuan');
    }

    public function indexpunguanama()
    {
        return view('.userguest\koinonia\punguanama');
    }

    public function indexsekolahminggu()
    {
        return view('.userguest\koinonia\sekolahminggu');
    }


    //MARTURIA
    public function indexsending()
    {
        return view('.userguest\marturia\sending');
    }

    public function indexmusik()
    {
        return view('.userguest\marturia\musik');
    }

    //DIAKONIA
    public function indexsosial()
    {
        return view('.userguest\diakonia\sosial');
    }

    public function indexmasyarakat()
    {
        return view('.userguest\diakonia\masyarakat');
    }

    public function indexkesehatan()
    {
        return view('.userguest\diakonia\kesehatan');
    }

    public function indexpendidikan()
    {
        return view('.userguest\diakonia\pendidikan');
    }
}
