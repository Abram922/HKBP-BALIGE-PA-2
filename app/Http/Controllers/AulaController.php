<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\gedung;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\BuktiPembayaran;
use App\Models\detailpemesanan;
use App\Models\StatusPemesanan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;

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


    public function tambah(Request $request, gedung $gedung)
    {
        return view('aula.booking', compact('gedung'));
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
            'alamat' => 'max:255',
            'gedung_id' => 'required',
            'metode_pembayaran' => 'required'
        ]));
        $validateData['user_id'] = auth()->user()->id;
        $validateData['kode_pemesanan'] = $kode_pemesanan;

        Aula::create($validateData);


        return redirect()->route('aula.index')->with('success', 'Pemesanan Berhasil');
    }

    // public function kirim(Request $request, $id)
    // {
    //     $gedung = gedung::where('id', $id)->first();

    //     $aula = new Aula;
    //     $aula->user_id = Auth::user()->id;
    //     $aula->gedung_id = $gedung->id;
    //     $aula->name = $request->name;
    //     $aula->email = $request->email;
    //     $aula->nomor_telepon = $request->nomor_telepon;
    //     $aula->tanggal_mulai = $request->tanggal_mulai;
    //     $aula->kepeluan = $request->kepeluan;
    //     $aula->tanggal_selesai = $request->tanggal_selesai;
    //     $aula->total = $request->total;
    //     $aula->pesan = $request->pesan;
    //     $aula->alamat = $request->alamat;

    //     $aula->save();

    //     return redirect()->route('aula.index')->with('success', 'Pemesanan Berhasil');
    // }

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
        $order->update(['status_id' => 3, 'status_pembayaran' => 10]);
        //REDIRECT KEMBALI DENGAN MENAMPILKAN ALERT SUCCESS
        return redirect()->back()->with(['success' => 'Pesanan Dikonfirmasi']);
    }

    public function buktipembayaran(Aula $aula)
    {
        if ($aula->metode_pembayaran == 2) {
            return view('aula.pembayaranpertama', compact('aula'));
        } elseif ($aula->metode_pembayaran == 1) {
            return view('aula.buktipembayaran', compact('aula'));
        }
    }

    public function buktipelunasansisa(Aula $aula)
    {
        if ($aula->status_pembayaran == 4 || $aula->status_pembayaran == 8) {
            return view('aula.pembayaransisa', compact('aula'));
        }
    }

    public function detailpemesanan(detailpemesanan $detail)
    {

        if ($detail->metode_pembayaran == 2) {
            return view('aula.detailpemesanancredit', compact('detail'));
        } elseif ($detail->metode_pembayaran == 1) {
            return view('aula.detailpemesanancredit', compact('detail'));
        }
    }




    public function storebukti(Request $request, Aula $aula)
    {
        $input_bukti = $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status_pembayaran' => 'required'
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

    public function storebuktipelunasan(Request $request, Aula $aula)
    {
        $input_bukti = $request->validate([
            'pembayaransisa' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status_pembayaran' => 'required'
        ]);

        $input_bukti['user_id'] = auth()->user()->id;


        if ($bukti_pembayaran = $request->file('pembayaransisa')) {
            $destinationPath = 'bukti_pembayaran_sisa/';
            $profileImage = date('YmdHis') . "." . $bukti_pembayaran->getClientOriginalExtension();
            $bukti_pembayaran->move($destinationPath, $profileImage);
            $input_bukti['pembayaransisa'] = "$profileImage";
        } else {
            unset($input['pembayaransisa']);
        }

        $aula->update($input_bukti);

        return redirect()->route('aula.index')->with('success', 'Bukti Pembayaran Berhasil di Tambah');
    }
}
