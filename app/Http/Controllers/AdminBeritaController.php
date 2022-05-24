<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class AdminBeritaController extends Controller
{
    public function index()
    {
        return view('pendeta.indexBerita', [
            'adminberita' => Berita::latest()->paginate(8)->withQueryString()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pendeta.createBerita');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input['user_id'] = auth()->user()->id;
        $input['excerpt'] = Str::limit(strip_tags($request->body), 75);

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        Berita::create($input);

        return redirect()->route('adminberita.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $adminberita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $adminberita)
    {
        return view('pendeta.checkberita', compact('adminberita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $adminberita
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $adminberita)
    {
        return view('pendeta.editBerita', compact('adminberita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $adminberita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $adminberita)
    {
        $input = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input['user_id'] = auth()->user()->id;
        $input['excerpt'] = Str::limit(strip_tags($request->body), 75);

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $adminberita->update($input);

        return redirect('/berita-admin')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $adminberita
     * @return \Illuminate\Http\Response
     */


    public function destroy(Berita $adminberita)
    {
        $adminberita->delete();
        return redirect('/berita-admin')
            ->with('success', 'Data berhasil dihapus');
    }
}
