<?php

namespace App\Http\Controllers;

use App\Models\Ting;
use Illuminate\Http\Request;

class TingtingControllerLogin extends Controller
{
    public function index() {
        $ting = Ting::all();
        return view('UserTerdaftar.tingting.index', [
            'ting' => $ting
        ]);
    }
}
