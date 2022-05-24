<?php

namespace App\Http\Controllers;

use App\Models\Musik;
use Illuminate\Http\Request;

class MusikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musik  = Musik::paginate(20);
        return view('koinonia.indexMusik',['musik'=>$musik]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('koinonia.tambahMusik');
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
     
        return redirect()->route('musik.index')
                        ->with('success','Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Musik  $musik
     * @return \Illuminate\Http\Response
     */
    public function show(Musik $musik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Musik  $musik
     * @return \Illuminate\Http\Response
     */
    public function edit(Musik $musik)
    {
        return view('koinonia.editMusik',compact('musik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Musik  $musik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Musik $musik)
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
          
        $musik->update($input);
    
        return redirect()->route('musik.index')
                        ->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Musik  $musik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Musik $musik)
    {
        $musik->delete();
     
        return redirect()->route('musik.index')
                        ->with('success','Data berhasil dihapus');
    }
}
