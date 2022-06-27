<?php

namespace App\Http\Controllers\Pendeta;

use App\Models\Kesehatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PendetaKesehatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $pendetakesehatan  = Kesehatan::paginate(5);
        return view('.pendeta.diakonia.indexKesehatan',['pendetakesehatan'=>$pendetakesehatan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('.pendeta.diakonia.tambahKesehatan');
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
    
        Kesehatan::create($input);
     
        return redirect()->route('pendetakesehatan.index')
                        ->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kesehatan  $pendetakesehatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kesehatan $pendetakesehatan)
    {
        return view('.pendeta.diakonia.show',compact('pendetakesehatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kesehatan  $pendetakesehatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kesehatan $pendetakesehatan)
    {
        return view('.pendeta.diakonia.editKesehatan',compact('pendetakesehatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kesehatan  $pendetakesehatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kesehatan $pendetakesehatan)
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
        }else{
            unset($input['image']);
        }
          
        $pendetakesehatan->update($input);
    
        return redirect()->route('pendetakesehatan.index')
                        ->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kesehatan  $pendetakesehatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kesehatan $pendetakesehatan)
    {
        $pendetakesehatan->delete();
     
        return redirect()->route('pendetakesehatan.index')
                        ->with('success','Data berhasil dihapus');
    }
}
