<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutentikasiController extends Controller
{
    public function login()
    {
        return view('autentikasi.login');
    }

    public function daftar()
    {
        return view('autentikasi.daftar', [
            'title' => 'Daftar',
            'active' => 'daftar'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => ['required', 'min:8', 'max:30', 'unique:users'],
            'username' => 'required',
            'phoneno' => 'min:12',
            'password' => 'required|min:5|max:255'
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        return redirect('/login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required|min:5|max:255'

        ]);
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->level_user == '1') {
                return redirect()->intended('/dash_pendeta');
            } elseif ($user->level_user == '2') {
                
                return redirect()->intended('/dash_bph');
            } elseif ($user->level_user == '3') {
                return redirect()->intended('/dash_user');
            }
            return redirect()->intended('/');
        }
        return redirect()->intended('/login');
    }

    public function dash_p()
    {
        return view('autentikasi.welcomependeta');
    }
    public function dash_b()
    {
        return view('autentikasi.welcomebph');
    }
    public function dash_u()
    {
        return view('autentikasi.welcomeuser');
    }


    public function logout(Request $request)
    {
        // $request->session()->flush();
        // Auth::logout();
        // return view('guest.index');

        // new logout
        Auth::logout(); 
 
        $request->session()->invalidate();
        //request()->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
