<?php

namespace App\Http\Controllers\Pendeta;

use App\Http\Controllers\Controller;

use App\Models\Parhalado;
use Illuminate\Http\Request;

class PendetaParhaladoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PendetaParhalado = Parhalado::paginate(20);
        return view('/pendeta.parhalado.indexparhalado', [
            'PendetaParhalado' => $PendetaParhalado
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/pendeta.parhalado.createParhalado');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $input = $request->validate([
            'name' => 'required|max:255',
            'title' => 'required',
            'lunggu' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Parhalado::create($input);

        // return
        return redirect()->route('PendetaParhalado.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parhalado  $PendetaParhalado
     * @return \Illuminate\Http\Response
     */
    public function show(Parhalado $PendetaParhalado)
    {
        // show parhalado
        return view('/pendeta.parhalado.showParhalado', [
            'PendetaParhalado' => $PendetaParhalado
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parhalado  $PendetaParhalado
     * @return \Illuminate\Http\Response
     */
    public function edit(Parhalado $PendetaParhalado)
    {
        return view('/pendeta.parhalado.editParhalado', [
            'PendetaParhalado' => $PendetaParhalado
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parhalado  $PendetaParhalado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parhalado $PendetaParhalado)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required'
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

        $PendetaParhalado->update($input);

        return redirect()->route('PendetaParhalado.index')
            ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parhalado  $PendetaParhalado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parhalado $PendetaParhalado)
    {
        $PendetaParhalado->delete();

        return redirect()->route('PendetaParhalado.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
