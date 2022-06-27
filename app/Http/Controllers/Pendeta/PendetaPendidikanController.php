<?php

namespace App\Http\Controllers\Pendeta;

use App\Models\Pendidikan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PendetaPendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendetapendidikan  = Pendidikan::paginate(5);
        return view('.pendeta.diakonia.indexPendidikan', ['pendetapendidikan' => $pendetapendidikan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('.pendeta.diakonia.tambahPendidikan');
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

        Pendidikan::create($input);

        return redirect()->route('pendetapendidikan.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendidikan  $pendetapendidikan
     * @return \Illuminate\Http\Response
     */
    public function show(Pendidikan $pendetapendidikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendidikan  $pendetapendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendidikan $pendetapendidikan)
    {
        return view('.pendeta.diakonia.editPendidikan', compact('pendetapendidikan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendidikan  $pendetapendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendidikan $pendetapendidikan)
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

        $pendetapendidikan->update($input);

        return redirect()->route('pendetapendidikan.index')
            ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendidikan  $pendetapendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendidikan $pendetapendidikan)
    {
        $pendetapendidikan->delete();

        return redirect()->route('pendetapendidikan.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
