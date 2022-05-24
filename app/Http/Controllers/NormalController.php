<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NormalController extends Controller
{
    public function index()
    {
        return view('.guest\index');
    }

    public function uji()
    {
        return view('.layout.superadmin');
    }
}
