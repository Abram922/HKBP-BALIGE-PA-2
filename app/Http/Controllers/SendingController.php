<?php

namespace App\Http\Controllers;

use App\Models\Sending;
use Illuminate\Http\Request;

class SendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sending  = Sending::paginate(20);
        return view('.koinonia.indexSending',['sending'=>$sending]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('koinonia.tambahSending');
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
     
        return redirect()->route('sending.index')
                        ->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sending  $sending
     * @return \Illuminate\Http\Response
     */
    public function show(Sending $sending)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sending  $sending
     * @return \Illuminate\Http\Response
     */
    public function edit(Sending $sending)
    {
        return view('.koinonia.editSending',compact('sending'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sending  $sending
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sending $sending)
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
          
        $sending->update($input);
    
        return redirect()->route('sending.index')
                        ->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sending  $sending
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sending $sending)
    {
        $sending->delete();
     
        return redirect()->route('sending.index')
                        ->with('success','Data berhasil dihapus');
    }
}
