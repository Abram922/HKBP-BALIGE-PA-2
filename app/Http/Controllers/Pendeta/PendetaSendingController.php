<?php

namespace App\Http\Controllers\Pendeta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sending;
class PendetaSendingController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendetasending  = Sending::paginate(5);
        return view('pendeta.koinonia.indexSending',['pendetasending'=>$pendetasending]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pendeta.koinonia.tambahSending');
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
    
        Sending::create($input);
     
        return redirect()->route('pendetasending.index')
                        ->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sending  $sending
     * @return \Illuminate\Http\Response
     */
    public function show(Sending $pendetasending)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sending  $sending
     * @return \Illuminate\Http\Response
     */
    public function edit(Sending $pendetasending)
    {
        return view('pendeta.koinonia.editSending',compact('pendetasending'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sending  $sending
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sending $pendetasending)
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
          
        $pendetasending->update($input);
    
        return redirect()->route('pendetasending.index')
                        ->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sending  $sending
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sending $pendetasending)
    {
        $pendetasending->delete();
     
        return redirect()->route('pendetasending.index')
                        ->with('success','Data berhasil dihapus');
    }
}
