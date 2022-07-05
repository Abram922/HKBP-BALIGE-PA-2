<?php

namespace App\Http\Controllers;

use App\Models\Renungan;
use Illuminate\Http\Request;

class OkeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Renungan  $renungan
     * @return \Illuminate\Http\Response
     */
    public function show(Renungan $renungan) {
        // return view('.guest.renunganfull', compact('guestrenungan'));
        return view('.guest.renunganfull', compact('renungan') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Renungan  $renungan
     * @return \Illuminate\Http\Response
     */
    public function edit(Renungan $renungan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Renungan  $renungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Renungan $renungan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Renungan  $renungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Renungan $renungan)
    {
        //
    }
}
