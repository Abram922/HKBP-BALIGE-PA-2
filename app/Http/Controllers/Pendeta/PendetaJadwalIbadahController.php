<?php

namespace App\Http\Controllers\Pendeta;

use App\Http\Controllers\Controller;
use App\Models\JadwalIbadah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendetaJadwalIbadahController extends Controller
{
    public function index()
    {
        return view('pendeta/tentang/indexJadwal');
    }

    public function lihatData()
    {


        $jadwalIbadah  = JadwalIbadah::paginate(20);
        return view('pendeta/tentang/indexJadwal', ['jadwalIbadah' => $jadwalIbadah]);
    }

    //CREATE DATA
    public function create()
    {
        return view('pendeta/tentang/tambahJadwal');
    }

    public function tambah(Request $request)
    {
        // insert data ke table pegawai
        DB::table('jadwal_ibadahs')->insert([
            'judul' => $request->judul,
            'date' => $request->date,
            'keterangan' => $request->keterangan
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/jadwalibadah');
    }


    //UPDATE DATA
    public function update()
    {
        return view('pendeta/tentang/editJadwal');
    }

    public function edit($id)
    {
        // mengambil data berita berdasarkan id yang dipilih
        $jadwalIbadah = DB::table('jadwal_ibadahs')->where('id', $id)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('pendeta/tentang/editJadwal', ['jadwalibadah' => $jadwalIbadah]);
    }

    public function ubah(Request $request)
    {
        // update data pegawai
        DB::table('jadwal_ibadahs')->where('id', $request->id)->update([
            'judul' => $request->judul,
            'date' => $request->date,
            'keterangan' => $request->keterangan
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/jadwalibadah');
    }

    //HAPUS DATA
    public function hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('jadwal_ibadahs')->where('id', $id)->delete();

        // alihkan halaman ke halaman pegawai
        return redirect('/jadwalibadah');
    }
}
