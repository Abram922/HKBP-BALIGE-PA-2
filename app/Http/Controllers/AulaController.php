<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Aula;
use App\Models\BuktiPembayaran;
use App\Models\StatusPemesanan;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aula = Aula::where('user_id', auth()->user()->id)->latest()->paginate(10);
        return view('aula.history', [
            'aula' => $aula
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('aula.booking');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $kode_pemesanan = "INV/AULA/HKBP" . now()->format('Y-m-d') . "/" . rand(100, 999);
        $validateData = $request->validate(([
            'name' => 'required',
            'email' => 'max:255|email',
            'nomor_telepon' => 'integer',
            'keperluan' => 'max:255',
            'tanggal_mulai',
            'tanggal_selesai',
            'total' => 'integer',
            'pesan' => 'max:255',
            'alamat' => 'max:255'
        ]));
        
        $validateData['user_id'] = auth()->user()->id;
        $validateData['kode_pemesanan'] = $kode_pemesanan;


        Aula::create($validateData);
        return redirect()->route('aula.index')->with('success', 'Pemesanan Berhasil');
    }

    public function cancel(Aula $aula)
    {
        $aula->status_id = 3;
        $aula->save();

        $pendingSubOrders = $aula->booking_status()->where('status_id', '!=', 3)->count();

        if ($pendingSubOrders == 0) {
            $aula->booking_status()->update(['status_id' => 3]);
        }

        return redirect('/order-history/{order}')->withMessage('Order was canceled');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aula $aula)
    {
        $aula->delete();

        return redirect()->route('aula.index')
            ->with('success', 'Data berhasil dihapus');
    }


    public function edit(Aula $aula)
    {
        return view('aula.updatebooking', compact('aula'));
    }



    public function update(Request $request, Aula $aula)
    {

        $aula::where('id', $aula->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'nomor_telepon' => $request->nomor_telepon,
            'alamat' => $request->alamat,
            'keperluan' => $request->keperluan,
            'tanggal_mulai' => Carbon::createFromFormat('Y-m-d', $request->tanggal_mulai),
            'tanggal_selesai' => Carbon::createFromFormat('Y-m-d', $request->tanggal_selesai),
            'total' => $request->total,
            'pesan' => $request->pesan,
        ]);
        return redirect()->route('aula.index')->with('success', 'Data berhasil diubah');
    }

    public function canceled($status_id)
    {
        Aula::where('status_id', $status_id)->update(array('status_id' => 3));
        return redirect()->route('aula.index')->with('success', 'Data berhasil diubah');
    }

    public function cancelOrder($id)
    {
        //CARI DATA ORDER BERDASARKAN ID
        $order = Aula::find($id);
        //UBAH STATUSNYA MENJADI 4
        $order->update(['status_id' => 3]);
        //REDIRECT KEMBALI DENGAN MENAMPILKAN ALERT SUCCESS
        return redirect()->back()->with(['success' => 'Pesanan Dikonfirmasi']);
    }

    public function buktipembayaran(Aula $aula)
    {
        return view('aula.buktipembayaran', compact('aula'));
    }

    public function storebukti(Request $request, Aula $aula)
    {
        $input_bukti = $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input_bukti['user_id'] = auth()->user()->id;


        if ($bukti_pembayaran = $request->file('bukti_pembayaran')) {
            $destinationPath = 'bukti_pembayaran/';
            $profileImage = date('YmdHis') . "." . $bukti_pembayaran->getClientOriginalExtension();
            $bukti_pembayaran->move($destinationPath, $profileImage);
            $input_bukti['bukti_pembayaran'] = "$profileImage";
        } else {
            unset($input['bukti_pembayaran']);
        }

        $aula->update($input_bukti);

        return redirect()->route('aula.index')->with('success', 'Bukti Pembayaran Berhasil di Tambah');
    }
}
