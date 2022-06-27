<?php

namespace App\Http\Controllers\Pendeta;

use App\Models\Remaja;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PendetaRemajaController extends Controller
{
    /**
     * Display a listing of the resource.
    *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendetaremaja  = Remaja::paginate(5);
        return view('pendeta.marturia.indexRemaja', ['pendetaremaja' => $pendetaremaja]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pendeta.marturia.tambahRemaja');
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

        Remaja::create($input);

        return redirect()->route('pendetaremaja.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Remaja  $pendetaremaja
     * @return \Illuminate\Http\Response
     */
    public function show(Remaja $pendetaremaja)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Remaja  $pendetaremaja
     * @return \Illuminate\Http\Response
     */
    public function edit(Remaja $pendetaremaja)
    {
        return view('pendeta.marturia.editRemaja', compact('pendetaremaja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Remaja  $pendetaremaja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Remaja $pendetaremaja)
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

        $pendetaremaja->update($input);

        return redirect()->route('pendetaremaja.index')
            ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Remaja  $pendetaremaja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Remaja $pendetaremaja)
    {
        $pendetaremaja->delete();

        return redirect()->route('pendetaremaja.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
