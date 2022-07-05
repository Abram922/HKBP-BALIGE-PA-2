<?php

namespace App\Http\Controllers;

use App\Models\gedung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('.gedung.index', [
            'gedung' => gedung::latest()->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('.gedung.tambah');
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
            'Gedung' => 'required|max:255',
            'Harga_Sewa' => 'required',
            'Biaya_Prokes' => 'required',
            'Total' => 'required',
            'gambar_gedung' => 'required',
            'keterangan' => 'required|max:40'

        ]);

        if ($image = $request->file('gambar_gedung')) {
            $destinationPath = 'gambar_gedung/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['gambar_gedung'] = "$profileImage";
        }
        $input['user_id'] = auth()->user()->id;

        gedung::create($input);
        return redirect()->route('gedung.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    // public function store(Request $request)
    // {
    //     $gedung = new gedung;

    //     $gedung->Gedung = $request->Gedung;
    //     $gedung->Harga_Sewa = $request->Harga_Sewa;
    //     $gedung->Total = $request->Gedung + $request->Harga_Sewa;
    //     $gedung->user_id = Auth::user()->id;

    //     $gedung->save();

    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
    }

    public function daftargedung()
    {

        $gedung = gedung::paginate(8);
        $user = Auth::user();
        if ($user->level_user == '3') {
            return view('.aula.gedung', [
                'gedung' => $gedung
            ]);
        }
        return view('.aula.index', compact('gedung'));
    }

    public function daftargedung2()
    {

        $gedung = gedung::paginate(8);

        return view('.guest.aula.booking', compact('gedung'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(gedung $gedung)
    {
        return view('.gedung.edit', compact('gedung'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, gedung $gedung)
    {
        $input = $request->validate([
            'Gedung' => 'required|max:255',
            'Harga_Sewa' => 'required',
            'Biaya_Prokes' => 'required',
            'Total' => 'required',
            'gambar_gedung' => 'required',
            'keterangan' => 'required|max:40'
        ]);
        if ($image = $request->file('gambar_gedung')) {
            $destinationPath = 'gambar_gedung/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['gambar_gedung'] = "$profileImage";
        }

        $input['user_id'] = auth()->user()->id;

        $gedung->update($input);

        return redirect()->route('gedung.index')
            ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(gedung $gedung)

    {
        $gedung->delete();
        return redirect()->route('gedung.index')
            ->with('success', 'Data berhasil diubah');
    }
}
