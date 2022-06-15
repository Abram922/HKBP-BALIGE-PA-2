<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuktiPembayaran;
use App\Models\Aula;

class BuktiPembayaranAula extends Controller
{
    public function store(Request $request)
    {
        $input_bukti = $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $input_bukti['no_pemesanan'] = auth()->buktipembayaran->id;

        if ($bukti_pembayaran = $request->file('bukti_pembayaran')) {
            $destinationPath = 'bukti_pembayaran/';
            $profileImage = date('YmdHis') . "." . $bukti_pembayaran->getClientOriginalExtension();
            $bukti_pembayaran->move($destinationPath, $profileImage);
            $input_bukti['bukti_pembayaran'] = "$profileImage";
        }

        BuktiPembayaran::create($input_bukti);

        return redirect()->route('aula.index')->with('success', 'Bukti Pembayaran Berhasil di Tambah');
    }
}
