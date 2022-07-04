<?php

namespace App\Http\Controllers;

use App\Models\Tanggal;
use Illuminate\Http\Request;

class TanggalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanggal  = Tanggal::paginate(20);
        return view('.tentang.indexTanggal',['tanggal'=>$tanggal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tentang.tambahTanggal');
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
     
        return redirect()->route('tanggal.index')
                        ->with('success','Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tanggal  $tanggal
     * @return \Illuminate\Http\Response
     */
    public function show(Tanggal $tanggal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tanggal  $tanggal
     * @return \Illuminate\Http\Response
     */
    public function edit(Tanggal $tanggal)
    {
        return view('tentang.editTanggal',compact('tanggal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tanggal  $tanggal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tanggal $tanggal)
    {
        $request->validate([
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
            'keterangan' => 'required',
        ]);
  
        $input = $request->all();
          
        $tanggal->update($input);
    
        return redirect()->route('tanggal.index')
                        ->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tanggal  $tanggal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tanggal $tanggal)
    {
        $tanggal->delete();
     
        return redirect()->route('tanggal.index')
                        ->with('success','Data berhasil dihapus');
    }
}
