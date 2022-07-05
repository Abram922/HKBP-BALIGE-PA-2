<?php

namespace App\Http\Controllers;

use App\Models\rekening;
use Illuminate\Http\Request;

class rekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('.rekening.index', [
            'rekening' => rekening::latest()->paginate(8)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('.rekening.create');
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
            'nama_bank' => 'required|max:255',
            'no_rekening' => 'required'

        ]);


        rekening::create($input);
        return redirect()->route('rekening.index')
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



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(rekening $rekening)
    {
        return view('.rekening.edit', compact('rekening'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rekening $rekening)
    {
        $input = $request->validate([
            'nama_bank' => 'required|max:255',
            'no_rekening' => 'required'

        ]);
        $rekening->update($input);

        return redirect()->route('rekening.index')
            ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(rekening $rekening)

    {
        $rekening->delete();
        return redirect()->route('gedung.index')
            ->with('success', 'Data berhasil diubah');
    }
}
