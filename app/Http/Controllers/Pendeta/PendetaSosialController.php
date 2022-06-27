<?php

namespace App\Http\Controllers\Pendeta;

use App\Models\Sosial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PendetaSosialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendetasosial  = Sosial::paginate(5);
        return view('..pendeta.diakonia.indexSosial', ['pendetasosial' => $pendetasosial]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('.pendeta.diakonia.tambahSosial');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Sosial::create($input);

        return redirect()->route('pendetasosial.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function edit(Sosial $pendetasosial)
    {
        return view('.pendeta.diakonia.editSosial', compact('pendetasosial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sosial $pendetasosial)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $pendetasosial->update($input);

        return redirect()->route('pendetasosial.index')
            ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Masyarakat  $masyarakat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sosial $pendetasosial)
    {
        $pendetasosial->delete();

        return redirect()->route('pendetasosial.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
