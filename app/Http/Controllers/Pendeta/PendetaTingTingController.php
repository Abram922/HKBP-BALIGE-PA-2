<?php

namespace App\Http\Controllers\Pendeta;

use App\Http\Controllers\Controller;
use App\Models\Ting;
use Illuminate\Http\Request;

class PendetaTingTingController extends Controller
{
    /**
     * Display a lisPendetaTingting of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PendetaTingting  = Ting::paginate(5);
        return view('.pendeta.tentang.indexTing', ['PendetaTingting' => $PendetaTingting]);
    }

    /**
     * Show the form for creaPendetaTingting a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('.pendeta.tentang.tambahTing');
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

        return redirect()->route('PendetaTingting.index')->with('success', 'Tinting Berahasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ting  $PendetaTingting
     * @return \Illuminate\Http\Response
     */
    public function show(Ting $PendetaTingting)
    {
        //
    }

    /**
     * Show the form for ediPendetaTingting the specified resource.
     *
     * @param  \App\Models\Ting  $PendetaTingting
     * @return \Illuminate\Http\Response
     */
    public function edit(Ting $PendetaTingting)
    {
        return view('.pendeta.tentang.editTing', compact('PendetaTingting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ting  $PendetaTingting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ting $PendetaTingting)
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
        } else {
            unset($input['image']);
        }

        $PendetaTingting->update($input);

        return redirect()->route('PendetaTingting.index')->with('success', 'Tingting berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ting  $PendetaTingting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ting $PendetaTingting)
    {
        $PendetaTingting->delete();

        return redirect()->route('PendetaTingting.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
