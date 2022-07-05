<?php

namespace App\Http\Controllers;

use App\Models\Renungan;
use Illuminate\Http\Request;

class RenunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $renungan = Renungan::where('user_id', auth()->user()->id)->latest()->paginate(4);
        return view('renungan.indexrenungan', [
            'renungan' => $renungan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //mengarahkan ke halaman form input renungan
        return view('renungan.createrenungan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //menambahkan data ke dalam database
        $input = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input['user_id'] = auth()->user()->id;

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Renungan::create($input);

        return redirect()->route('renungans.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Renungan $renungan)
    {
        //menampilkan data
        return view('renungan.checkrenungan', [
            'renungan' => $renungan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Renungan $renungan)
    {
        return view('renungan.editrenungan', compact('renungan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Renungan $renungan)
    {
        //ubah data 
        $input = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $input['user_id'] = auth()->user()->id;

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $renungan->update($input);

        return redirect()->route('renungans.index')
            ->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Renungan $renungan)
    {
        //menghapus data
        $renungan->delete();

        return redirect()->route('renungans.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
