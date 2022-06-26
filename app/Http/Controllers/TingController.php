<?php

namespace App\Http\Controllers;

use App\Models\Ting;
use Illuminate\Http\Request;

class TingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ting  = Ting::paginate(20);
        return view('.tentang.indexTing',['ting'=>$ting]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tentang.tambahTing');
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
            'image' => 'required|mimes:pdf|max:5000',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'file/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Ting::create($input);
     
        return redirect()->route('ting.index')
                        ->with('success','Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ting  $ting
     * @return \Illuminate\Http\Response
     */
    public function show(Ting $ting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ting  $ting
     * @return \Illuminate\Http\Response
     */
    public function edit(Ting $ting)
    {
        return view('tentang.editTing',compact('ting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ting  $ting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ting $ting)
    {
        
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'image' => 'required|mimes:pdf|max:5000',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'file/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $ting->update($input);
    
        return redirect()->route('ting.index')
                        ->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ting  $ting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ting $ting)
    {
        $ting->delete();
     
        return redirect()->route('ting.index')
                        ->with('success','Data berhasil dihapus');
    }
}
