<?php

namespace App\Http\Controllers\Pendeta;

use App\Http\Controllers\Controller;
use App\Models\Tanggal;
use Illuminate\Http\Request;

class PendetaTanggalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendetatanggal  = Tanggal::paginate(20);
        return view('.pendeta.tentang.indexTanggal',['pendetatanggal'=>$pendetatanggal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('.pendeta.tentang.tambahTanggal');
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
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
            'keterangan' => 'required',
        ]);
  
        $input = $request->all();
    
        Tanggal::create($input);
     
        return redirect()->route('pendetatanggal.index')
                        ->with('success','Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tanggal  $tanggal
     * @return \Illuminate\Http\Response
     */
    public function show(Tanggal $pendetatanggal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tanggal  $tanggal
     * @return \Illuminate\Http\Response
     */
    public function edit(Tanggal $pendetatanggal)
    {
        return view('pendeta.tentang.editTanggal',compact('pendetatanggal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tanggal  $tanggal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tanggal $pendetatanggal)
    {
        $request->validate([
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
            'keterangan' => 'required',
        ]);
  
        $input = $request->all();
          
        $pendetatanggal->update($input);
    
        return redirect()->route('pendetatanggal.index')
                        ->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tanggal  $tanggal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tanggal $pendetatanggal)
    {
        $pendetatanggal->delete();
     
        return redirect()->route('pendetatanggal.index')
                        ->with('success','Data berhasil dihapus');
    }
    
}
