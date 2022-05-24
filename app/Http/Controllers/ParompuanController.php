<?php

namespace App\Http\Controllers;

use App\Models\Parompuan;
use Illuminate\Http\Request;

class ParompuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parompuan  = Parompuan::paginate(20);
        return view('.marturia.indexParompuan',['parompuan'=>$parompuan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marturia.tambahParompuan');
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
    
        Parompuan::create($input);
     
        return redirect()->route('parompuan.index')
                        ->with('success','Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parompuan  $parompuan
     * @return \Illuminate\Http\Response
     */
    public function show(Parompuan $parompuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parompuan  $parompuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Parompuan $parompuan)
    {
        return view('marturia.editParompuan',compact('parompuan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parompuan  $parompuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parompuan $parompuan)
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
          
        $parompuan->update($input);
    
        return redirect()->route('parompuan.index')
                        ->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parompuan  $parompuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parompuan $parompuan)
    {
        $parompuan->delete();
     
        return redirect()->route('parompuan.index')
                        ->with('success','Data berhasil dihapus');
    }
}
