<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Aula;
use App\Models\StatusPemesanan;
use Illuminate\Http\Request;

class AdminAulaController extends Controller
{
    public function index()
    {
        return view('.aula.index', [
            'adminaula' => Aula::latest()->paginate(8)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit(Aula $adminaula)
    {
        $status = StatusPemesanan::all();
        return view('aula.editstatus_pemesanan', compact('status', 'adminaula'));
    }




    public function update(Request $request, Aula $adminaula)
    {

        $adminaula::where('id', $adminaula->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'nomor_telepon' => $request->nomor_telepon,
            'alamat' => $request->alamat,
            'keperluan' => $request->keperluan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'total' => $request->total,
            'pesan' => $request->pesan,
            'status_id' => $request->status_id
        ]);
        return redirect()->route('adminaula.index')->with('success', 'Data berhasil diubah');
    }

    public function cancelOrderAdmin($id)
    {
        //CARI DATA ORDER BERDASARKAN ID
        $order = Aula::find($id);
        //UBAH STATUSNYA MENJADI 4
        $order->update(['status_id' => 3]);
        //REDIRECT KEMBALI DENGAN MENAMPILKAN ALERT SUCCESS
        return redirect()->back()->with(['success' => 'Pesanan Dikonfirmasi']);
    }

    public function approveOrderAdmin($id)
    {
        //CARI DATA ORDER BERDASARKAN ID
        $order = Aula::find($id);
        //UBAH STATUSNYA MENJADI 4
        $order->update(['status_id' => 2]);
        //REDIRECT KEMBALI DENGAN MENAMPILKAN ALERT SUCCESS
        return redirect()->back()->with(['success' => 'Pesanan Dikonfirmasi']);
    }






    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
