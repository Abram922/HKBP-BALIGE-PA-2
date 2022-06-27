<?php

namespace App\Http\Controllers\Pendeta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lanjut;
class PendetaLansiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendetalanjut  = Lanjut::paginate(5);
        return view('pendeta.marturia.indexLan',['pendetalanjut'=>$pendetalanjut]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pendeta.marturia.tambahLan');
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
    
        Lanjut::create($input);
     
        return redirect()->route('pendetalanjut.index')
                        ->with('success','Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lanjut  $lanjut
     * @return \Illuminate\Http\Response
     */
    public function show(Lanjut $lanjut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lanjut  $lanjut
     * @return \Illuminate\Http\Response
     */
    public function edit(Lanjut $pendetalanjut)
    {
        return view('pendeta.marturia.editLan',compact('pendetalanjut'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lanjut  $lanjut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lanjut $pendetalanjut)
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
          
        $pendetalanjut->update($input);
    
        return redirect()->route('pendetalanjut.index')
                        ->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lanjut  $lanjut
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lanjut $pendetalanjut)
    {
        $pendetalanjut->delete();
     
        return redirect()->route('pendetalanjut.index')
                        ->with('success','Data berhasil dihapus');
    }
}
