<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Aula;
use App\Models\StatusPemesanan;
use Illuminate\Http\Request;

class AdminAulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit(Aula $adminaula)
    // {
    //     $status = DB::table('status_pemesanans')->get();
    //     return view('aula.editstatus_pemesanan', compact('adminaula', 'status'));
    // }

    public function edit(Aula $adminaula)
    {
        $status = StatusPemesanan::all();
        return view('aula.editstatus_pemesanan', compact('status', 'adminaula'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Aula $adminaula)
    // {

    //     $validateData = $request->validate(([
    //         'name' => 'required',
    //         'email' => 'max:255|email',
    //         'nomor_telepon' => 'integer',
    //         'keperluan' => 'max:255',
    //         'tanggal_mulai',
    //         'tanggal_selesai',
    //         'total' => 'integer',
    //         'pesan' => 'max:255',
    //         'alamat' => 'max:255',
    //         'status_pemesanan',
    //     ]));
    //     $validateData['user_id'] = auth()->user()->id;
    //     $adminaula->update($validateData);
    //     return redirect()->route('adminaula.index')
    //         ->with('success', 'Data berhasil diubah');
    // }

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
