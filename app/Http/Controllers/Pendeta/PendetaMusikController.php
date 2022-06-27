<?php

namespace App\Http\Controllers\Pendeta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Musik;

class PendetaMusikController extends Controller
{
    public function index()
    {
        $pendetamusik  = Musik::paginate(5);
        return view('.pendeta.koinonia.indexMusik',['pendetamusik'=>$pendetamusik]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('.pendeta.koinonia.tambahMusik');
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
    
        Musik::create($input);
     
        return redirect()->route('pendetamusik.index')
                        ->with('success','Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Musik  $musik
     * @return \Illuminate\Http\Response
     */
    public function show(Musik $pendetamusik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Musik  $musik
     * @return \Illuminate\Http\Response
     */
    public function edit(Musik $pendetamusik)
    {
        return view('pendeta.koinonia.editMusik',compact('pendetamusik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Musik  $musik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Musik $pendetamusik)
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
          
        $pendetamusik->update($input);
    
        return redirect()->route('pendetamusik.index')
                        ->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Musik  $musik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Musik $pendetamusik)
    {
        $pendetamusik->delete();
     
        return redirect()->route('pendetamusik.index')
                        ->with('success','Data berhasil dihapus');
    }
}
