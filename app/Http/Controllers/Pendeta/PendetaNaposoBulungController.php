<?php

namespace App\Http\Controllers\Pendeta;

use App\Models\Naposo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PendetaNaposoBulungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendetanaposo  = Naposo::paginate(20);
        return view('..pendeta.marturia.indexNaposo', ['pendetanaposo' => $pendetanaposo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('.pendeta.marturia.tambahNaposo');
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

        Naposo::create($input);

        return redirect()->route('pendetanaposo.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Naposo  $pendetanaposo
     * @return \Illuminate\Http\Response
     */
    public function show(Naposo $pendetanaposo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Naposo  $pendetanaposo
     * @return \Illuminate\Http\Response
     */
    public function edit(Naposo $pendetanaposo)
    {
        return view('.pendeta.marturia.editNaposo', compact('pendetanaposo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Naposo  $pendetanaposo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Naposo $pendetanaposo)
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

        $pendetanaposo->update($input);

        return redirect()->route('pendetanaposo.index')
            ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Naposo  $pendetanaposo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Naposo $pendetanaposo)
    {
        $pendetanaposo->delete();

        return redirect()->route('pendetanaposo.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
