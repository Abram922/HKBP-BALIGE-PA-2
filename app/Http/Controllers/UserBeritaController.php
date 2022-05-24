<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Http\Request;

class UserBeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest();


        if (request('search')) {
            $berita->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }

        $user = User::all();

        return view('.guest.berita.berita', [
            "judul" => "berita",
            "berita" => Berita::latest()->filter(request(['search']))->paginate(8)->withQueryString(),
            compact('user')
        ]);
    }

    public function show(Berita $berita)
    {
        return view('.guest.berita.beritafull', [
            "title" => "beritafull",
            "berita" => $berita  // dicari berdasarkan post
        ]);
    }

    public function authorpost(User $user)
    {
        return view('.guest.berita.beritaauthor', [
            'title' => 'post by author',
            'berita' => $user->berita->load('user')
        ]);
    }
}
