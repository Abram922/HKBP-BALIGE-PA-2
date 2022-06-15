<?php

namespace App\Http\Controllers\Pendeta;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Parompuan;
class PendetaParompuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendetaparompuan  = Parompuan::paginate(20);
        return view('pendeta.marturia.indexParompuan',['pendetaparompuan'=>$pendetaparompuan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pendeta.marturia.tambahParompuan');
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
     
        return redirect()->route('pendetaparompuan.index')
                        ->with('success','Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parompuan  $parompuan
     * @return \Illuminate\Http\Response
     */
    public function show(Parompuan $pendetaparompuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parompuan  $parompuan
     * @return \Illuminate\Http\Response
     */
    public function edit(Parompuan $pendetaparompuan)
    {
        return view('pendeta.marturia.editParompuan',compact('pendetaparompuan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parompuan  $parompuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parompuan $pendetaparompuan)
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
          
        $pendetaparompuan->update($input);
    
        return redirect()->route('pendetaparompuan.index')
                        ->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parompuan  $parompuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parompuan $pendetaparompuan)
    {
        $pendetaparompuan->delete();
     
        return redirect()->route('pendetaparompuan.index')
                        ->with('success','Data berhasil dihapus');
    }
}
