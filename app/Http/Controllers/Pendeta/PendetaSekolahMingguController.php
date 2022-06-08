<?php

namespace App\Http\Controllers\Pendeta;

use App\Models\Sekolah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PendetaSekolahMingguController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendetasekolah  = Sekolah::paginate(20);
        return view('.pendeta.marturia.indexSekolah', ['pendetasekolah' => $pendetasekolah]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('.pendeta.marturia.tambahSekolah');
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

        Sekolah::create($input);

        return redirect()->route('pendetasekolah.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sekolah  $pendetasekolah
     * @return \Illuminate\Http\Response
     */
    public function show(Sekolah $pendetasekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sekolah  $pendetasekolah
     * @return \Illuminate\Http\Response
     */
    public function edit(Sekolah $pendetasekolah)
    {
        return view('.pendeta.marturia.editSekolah', compact('pendetasekolah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sekolah  $pendetasekolah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sekolah $pendetasekolah)
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

        $pendetasekolah->update($input);

        return redirect()->route('pendetasekolah.index')
            ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sekolah  $pendetasekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sekolah $pendetasekolah)
    {
        $pendetasekolah->delete();

        return redirect()->route('pendetasekolah.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
