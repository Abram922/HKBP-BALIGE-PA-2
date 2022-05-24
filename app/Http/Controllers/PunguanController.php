<?php

namespace App\Http\Controllers;

use App\Models\Punguan;
use Illuminate\Http\Request;

class PunguanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $punguan  = Punguan::paginate(20);
        return view('.marturia.indexPunguan',['punguan'=>$punguan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marturia.tambahPunguan');
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
    
        Punguan::create($input);
     
        return redirect()->route('punguan.index')
                        ->with('success','Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Punguan  $punguan
     * @return \Illuminate\Http\Response
     */
    public function show(Punguan $punguan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Punguan  $punguan
     * @return \Illuminate\Http\Response
     */
    public function edit(Punguan $punguan)
    {
        return view('marturia.editPunguan',compact('punguan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Punguan  $punguan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Punguan $punguan)
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
          
        $punguan->update($input);
    
        return redirect()->route('punguan.index')
                        ->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Punguan  $punguan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Punguan $punguan)
    {
        $punguan->delete();
     
        return redirect()->route('punguan.index')
                        ->with('success','Data berhasil dihapus');
    }
}
