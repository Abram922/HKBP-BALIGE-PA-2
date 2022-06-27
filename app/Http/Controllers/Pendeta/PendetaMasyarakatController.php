<?php

namespace App\Http\Controllers\Pendeta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Masyarakat;

class PendetaMasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendetamasyarakat  = Masyarakat::paginate(5);
        return view('.pendeta.diakonia.indexMasyarakat', ['pendetamasyarakat' => $pendetamasyarakat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('.pendeta.diakonia.tambahMasyarakat');
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
            'name' => 'required',
            'detail' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Masyarakat::create($input);

        return redirect()->route('pendetamasyarakat.index')
        ->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Masyarakat  $pendetamasyarakat
     * @return \Illuminate\Http\Response
     */
    public function show(Masyarakat $pendetamasyarakat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Masyarakat  $pendetamasyarakat
     * @return \Illuminate\Http\Response
     */
    public function edit(Masyarakat $pendetamasyarakat)
    {
        return view('.pendeta.diakonia.editMasyarakat', compact('pendetamasyarakat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Masyarakat  $pendetamasyarakat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Masyarakat $pendetamasyarakat)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required'
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

        $pendetamasyarakat->update($input);

        return redirect()->route('pendetamasyarakat.index')
        ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Masyarakat  $pendetamasyarakat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Masyarakat $pendetamasyarakat)
    {
        $pendetamasyarakat->delete();

        return redirect()->route('pendetamasyarakat.index')
        ->with('success', 'Data berhasil dihapus');
    }
}
