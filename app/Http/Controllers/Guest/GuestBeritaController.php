<?php

namespace App\Http\Controllers\Guest;

use App\Models\Berita;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestBeritaController extends Controller
{
    public function index()
    {
        $guestberita = Berita::latest();


        if (request('search')) {
            $guestberita->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }

        $user = User::all();

        return view('.guest.berita.berita', [
            "judul" => "berita",
            "guestberita" => Berita::latest()->filter(request(['search']))->paginate(8)->withQueryString(),
            compact('user')
        ]);
    }

    public function show(Berita $guestberita)
    {
        return view('.guest.berita.beritafull', [
            "title" => "beritafull",
            "guestberita" => $guestberita  // dicari berdasarkan post
        ]);
    }

    public function authorpost(User $user)
    {
        return view('.guest.berita.beritaauthor', [
            'title' => 'post by author',
            'guestberita' => $user->berita->load('user')
        ]);
    }
}
