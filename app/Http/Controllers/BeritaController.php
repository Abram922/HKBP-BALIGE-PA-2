<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use illuminate\Support\Str;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $berita  = Berita::paginate(20);
    //     return view('.berita.indexBerita', ['berita' => $berita]);
    // }

    public function index()
    {
        $berita = Berita::where('user_id', auth()->user()->id)->latest()->paginate(20);
        return view('berita.indexBerita', [
            'berita' => $berita
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berita.createBerita');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input['user_id'] = auth()->user()->id;
        $input['excerpt'] = Str::limit(strip_tags($request->body), 75);

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Berita::create($input);

        return redirect()->route('beritas.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        return view('berita.checkberita', [
            "title" => "view berita",
            "berita" => $berita,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $berita)
    {
        return view('berita.editBerita', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $berita)
    {
        $input = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input['user_id'] = auth()->user()->id;
        $input['excerpt'] = Str::limit(strip_tags($request->body), 75);

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $berita->update($input);

        return redirect()->route('beritas.index')
            ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $berita)
    {
        $berita->delete();

        return redirect()->route('beritas.index')
            ->with('success', 'Data berhasil dihapus');
    }





    ////////////////////////////////////////////////////////////////////////////
    // SuperAdmin //
    ////////////////////////////////////////////////////////////////////////////

    public function berita_all()
    {
        return view('pendeta.indexBerita', [
            'berita' => Berita::latest()->paginate(8)->withQueryString()
        ]);
    }

    public function destroy_berita_admin(Berita $berita)
    {
        $berita->delete();

        return redirect()->route('pendeta.indexBerita')
            ->with('success', 'Data berhasil dihapus');
    }

    public function edit_berita_admin(Berita $berita)
    {
        return view('berita.editBerita', compact('berita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update_berita_admin(Request $request, Berita $berita)
    {
        $input = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input['user_id'] = auth()->user()->id;
        $input['excerpt'] = Str::limit(strip_tags($request->body), 75);

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $berita->update($input);

        return redirect()->route('beritas.index')
            ->with('success', 'Data berhasil diubah');
    }

    // public function storebukti(Request $request)
    // {
    //     $input_bukti = $request->validate([
    //         'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);


    //     $input_bukti['no_pemesanan'] = auth()->buktipembayaran->id;

    //     if ($bukti_pembayaran = $request->file('bukti_pembayaran')) {
    //         $destinationPath = 'bukti_pembayaran/';
    //         $profileImage = date('YmdHis') . "." . $bukti_pembayaran->getClientOriginalExtension();
    //         $bukti_pembayaran->move($destinationPath, $profileImage);
    //         $input_bukti['bukti_pembayaran'] = "$profileImage";
    //     }

    //     BuktiPembayaran::create($input_bukti);

    //     return redirect()->route('aula.index')->with('success', 'Bukti Pembayaran Berhasil di Tambah');
    // }
}
 