<?php

namespace App\Http\Controllers;

use App\Models\Lan;
use Illuminate\Http\Request;

class LanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lan  = Lan::paginate(20);
        return view('.marturia.indexLan',['lan'=>$lan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marturia.tambahLan');
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
    
        Lan::create($input);
     
        return redirect()->route('lansian.index')
                        ->with('success','Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lan  $lan
     * @return \Illuminate\Http\Response
     */
    public function show(Lan $lan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lan  $lan
     * @return \Illuminate\Http\Response
     */
    public function edit(Lan $lan)
    {
        return view('marturia.editLan',compact('lan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lan  $lan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lan $lan)
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
          
        $lan->update($input);
    
        return redirect()->route('lansian.index')
                        ->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lan  $lan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lan $lan)
    {
        $lan->delete();
     
        return redirect()->route('lansian.index')
                        ->with('success','Data berhasil dihapus');
    }
}
