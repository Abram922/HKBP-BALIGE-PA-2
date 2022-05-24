<?php

namespace App\Http\Controllers;

use App\Models\Naposo;
use Illuminate\Http\Request;

class NaposoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $naposo  = Naposo::paginate(20);
        return view('.marturia.indexNaposo',['naposo'=>$naposo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marturia.tambahNaposo');
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
    
        Naposo::create($input);
     
        return redirect()->route('naposo.index')
                        ->with('success','Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Naposo  $naposo
     * @return \Illuminate\Http\Response
     */
    public function show(Naposo $naposo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Naposo  $naposo
     * @return \Illuminate\Http\Response
     */
    public function edit(Naposo $naposo)
    {
        return view('marturia.editNaposo',compact('naposo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Naposo  $naposo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Naposo $naposo)
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
          
        $naposo->update($input);
    
        return redirect()->route('naposo.index')
                        ->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Naposo  $naposo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Naposo $naposo)
    {
        $naposo->delete();
     
        return redirect()->route('naposo.index')
                        ->with('success','Data berhasil dihapus');
    
    }
}
