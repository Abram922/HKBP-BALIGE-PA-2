<?php

namespace App\Http\Controllers;

use App\Models\Remaja;
use Illuminate\Http\Request;

class RemajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $remaja  = Remaja::paginate(20);
        return view('.marturia.indexRemaja',['remaja'=>$remaja]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marturia.tambahRemaja');
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
     
        return redirect()->route('remaja.index')
                        ->with('success','Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Remaja  $remaja
     * @return \Illuminate\Http\Response
     */
    public function show(Remaja $remaja)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Remaja  $remaja
     * @return \Illuminate\Http\Response
     */
    public function edit(Remaja $remaja)
    {
        return view('marturia.editRemaja',compact('remaja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Remaja  $remaja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Remaja $remaja)
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
          
        $remaja->update($input);
    
        return redirect()->route('remaja.index')
                        ->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Remaja  $remaja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Remaja $remaja)
    {
        $remaja->delete();
     
        return redirect()->route('remaja.index')
                        ->with('success','Data berhasil dihapus');
    }
}
