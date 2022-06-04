<?php

namespace App\Http\Controllers;

use App\Models\Remaja;
use App\Models\User;
use App\Models\Sekolah;
use App\Models\Parompuan;
use App\Models\Naposo;
use App\Models\Punguan;
use App\Models\Lanjut;
use App\Models\Musik;
use App\Models\Sending;
use App\Models\Sosial;
use App\Models\Masyarakat;
use App\Models\Kesehatan;
use App\Models\Pendidikan;
use Illuminate\Http\Request;

class UserKoinoniaController extends Controller
{
    public function userremaja()
    {
        $remaja = Remaja::latest();

        if (request('search')) {
            $remaja->where('name', 'like', '%' . request('search') . '%');
        }

        return view('.guest.koinonia.remaja', [
            "name" => "remaja",
            "remaja" => Remaja::latest()->paginate(8)->withQueryString()
        ]);
    }

    public function showremaja(Remaja $remaja)
    {
        return view('.guest.koinonia.remajafull', [
            "name" => "beritafull",
            "remaja" => $remaja  // dicari berdasarkan post
        ]);
    }


    //SEKOLAH MINGGU
    public function usersekolahminggu()
    {
        $sekolah = Sekolah::latest();

        if (request('search')) {
            $sekolah->where('name', 'like', '%' . request('search') . '%');
        }

        return view('.guest.koinonia.sekolahminggu', [
            "name" => "sekolah",
            "sekolah" => Sekolah::latest()->paginate(8)->withQueryString()
        ]);
    }

    public function showsekolahminggu(Sekolah $sekolah)
    {
        return view('.guest.koinonia.sekolahminggufull', [
            "name" => "sekolahminggufull",
            "sekolah" => $sekolah  // dicari berdasarkan post
        ]);
    }

    //SEKOLAH NAPOSO
    public function usernaposo()
    {
        $naposo = Naposo::latest();

        if (request('search')) {
            $naposo->where('name', 'like', '%' . request('search') . '%');
        }

        return view('.guest.koinonia.naposo', [
            "name" => "naposo",
            "naposo" => Naposo::latest()->paginate(8)->withQueryString()
        ]);
    }

    public function shownaposo(Naposo $naposo)
    {
        return view('.guest.koinonia.naposofull', [
            "name" => "naposofull",
            "naposo" => $naposo  // dicari berdasarkan post
        ]);
    }

    //KOINONIA PAROMPUAN
    public function userparompuan()
    {
        $parompuan = Parompuan::latest();

        if (request('search')) {
            $parompuan->where('name', 'like', '%' . request('search') . '%');
        }

        return view('.guest.koinonia.parompuan', [
            "name" => "parompuan",
            "parompuan" => Parompuan::latest()->paginate(8)->withQueryString()
        ]);
    }

    public function showparompuan(Parompuan $parompuan)
    {
        return view('.guest.koinonia.parompuanfull', [
            "name" => "parompuanfull",
            "parompuan" => $parompuan  // dicari berdasarkan post
        ]);
    }

    //KOINONIA PUNGUAN AMA
    public function userpunguan()
    {
        $punguan = Punguan::latest();

        if (request('search')) {
            $punguan->where('name', 'like', '%' . request('search') . '%');
        }

        return view('.guest.koinonia.punguanama', [
            "name" => "punguan",
            "punguan" => Punguan::latest()->paginate(8)->withQueryString()
        ]);
    }

    public function showpunguan(Punguan $punguan)
    {
        return view('.guest.koinonia.punguanamafull', [
            "name" => "punguanamafull",
            "punguan" => $punguan  // dicari berdasarkan post
        ]);
    }

    //KOINONIA LANSIA
    public function userlansia()
    {
        $lanjut = Lanjut::latest();

        if (request('search')) {
            $lanjut->where('name', 'like', '%' . request('search') . '%');
        }

        return view('.guest.koinonia.lansia', [
            "name" => "lanjut",
            "lanjut" => Lanjut::latest()->paginate(8)->withQueryString()
        ]);
    }

    public function showlansia(Lanjut $lanjut)
    {
        return view('.guest.koinonia.lansiafull', [
            "name" => "lansiafull",
            "lanjut" => $lanjut  // dicari berdasarkan post
        ]);
    }


    //MARTURIA MUSIK
    public function usermusik()
    {
        $musik = Musik::latest();

        if (request('search')) {
            $musik->where('name', 'like', '%' . request('search') . '%');
        }

        return view('.guest.marturia.musik', [
            "name" => "musik",
            "musik" => Musik::latest()->paginate(8)->withQueryString()
        ]);
    }

    public function showmusik(Musik $musik)
    {
        return view('.guest.marturia.musikfull', [
            "name" => "musikfull",
            "musik" => $musik  // dicari berdasarkan post
        ]);
    }

    //MARTURIA SENDING
    public function usersending()
    {
        $sending = Sending::latest();

        if (request('search')) {
            $sending->where('name', 'like', '%' . request('search') . '%');
        }

        return view('.guest.marturia.sending', [
            "name" => "sending",
            "sending" => Sending::latest()->paginate(8)->withQueryString()
        ]);
    }

    public function showsending(Sending $sending)
    {
        return view('.guest.marturia.sendingfull', [
            "name" => "sendingfull",
            "sending" => $sending  // dicari berdasarkan post
        ]);
    }


    //DIAKONIA SOSIAL
    public function usersosial()
    {
        $sosial = Sosial::latest();

        if (request('search')) {
            $sosial->where('name', 'like', '%' . request('search') . '%');
        }

        return view('.guest.diakonia.sosial', [
            "name" => "sosial",
            "sosial" => Sosial::latest()->paginate(8)->withQueryString()
        ]);
    }

    public function showsosial(Sosial $sosial)
    {
        return view('.guest.diakonia.sosialfull', [
            "name" => "sosialfull",
            "sosial" => $sosial  // dicari berdasarkan post
        ]);
    }

    //DIAKONIA MASYARAKT
    public function usermasyarakat()
    {
        $masyarakat = Masyarakat::latest();

        if (request('search')) {
            $masyarakat->where('name', 'like', '%' . request('search') . '%');
        }

        return view('.guest.diakonia.masyarakat', [
            "name" => "masyarakat",
            "masyarakat" => Masyarakat::latest()->paginate(8)->withQueryString()
        ]);
    }

    public function showmasyarakat(Masyarakat $masyarakat)
    {
        return view('.guest.diakonia.masyarakatfull', [
            "name" => "masyarakatfull",
            "masyarakat" => $masyarakat  // dicari berdasarkan post
        ]);
    }

    //DIAKONIA KESEHATAN
    public function userkesehatan()
    {
        $kesehatan = Kesehatan::latest();

        if (request('search')) {
            $kesehatan->where('name', 'like', '%' . request('search') . '%');
        }

        return view('.guest.diakonia.kesehatan', [
            "name" => "kesehatan",
            "kesehatan" => Kesehatan::latest()->paginate(8)->withQueryString()
        ]);
    }

    public function showkesehatan(Kesehatan $kesehatan)
    {
        return view('.guest.diakonia.kesehatanfull', [
            "name" => "kesehatanfull",
            "kesehatan" => $kesehatan  // dicari berdasarkan post
        ]);
    }

    //DIAKONIA PENDIDIKAN
    public function userpendidikan()
    {
        $pendidikan = Pendidikan::latest();

        if (request('search')) {
            $pendidikan->where('name', 'like', '%' . request('search') . '%');
        }

        return view('.guest.diakonia.pendidikan', [
            "name" => "pendidikan",
            "pendidikan" => Pendidikan::latest()->paginate(8)->withQueryString()
        ]);
    }

    public function showpendidikan(Pendidikan $pendidikan)
    {
        return view('.guest.diakonia.pendidikanfull', [
            "name" => "pendidikanfull",
            "pendidikan" => $pendidikan  // dicari berdasarkan post
        ]);
    }
}
