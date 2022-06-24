<?php

namespace App\Http\Controllers;

use App\Models\Parhalado;
use Illuminate\Http\Request;

class ParhaladoControllerLogin extends Controller
{
    public function index() {
        // mengembalikan view parhalado
        $parhalado = Parhalado::paginate(12);

        return view('UserTerdaftar.parhalado.index', [
            'parhalados' => $parhalado
        ]);
    }
}
