<?php

namespace App\Http\Controllers;

use App\Models\Parhalado;
use Illuminate\Http\Request;

class ParhaladoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parhalado = Parhalado::paginate(4);
        return view('parhalado.indexparhalado', [
            'parhalados' => $parhalado
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parhalado.createParhalado');
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
        return redirect()->route('parhalados.index')
                        ->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parhalado  $parhalado
     * @return \Illuminate\Http\Response
     */
    public function show(Parhalado $parhalado)
    {
        // show parhalado
        return view('parhalado.showParhalado', [
            'parhalado' => $parhalado
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parhalado  $parhalado
     * @return \Illuminate\Http\Response
     */
    public function edit(Parhalado $parhalado)
    {
        return view('parhalado.editParhalado', [
            'parhalado' => $parhalado
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parhalado  $parhalado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parhalado $parhalado)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'lunggu' => 'required'
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $parhalado->update($input);
    
        return redirect()->route('parhalados.index')
                        ->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parhalado  $parhalado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parhalado $parhalado)
    {
        $parhalado->delete();

        return redirect()->route('parhalados.index')
                        ->with('success','Data berhasil dihapus');
    }
}
