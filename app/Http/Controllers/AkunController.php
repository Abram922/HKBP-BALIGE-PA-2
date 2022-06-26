<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;

use Illuminate\Http\Request;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();
        return view('.Akun.index', [
            'user' => User::where('id', '>', 1)->latest()->paginate(8)->withQueryString(),
            compact('role')
        ]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, User $user)
    {

        $user::where('id', $user->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phoneno' => $request->phoneno,
            'username' => $request->username,
            'level_user' => $request->level_user
        ]);
        return redirect()->route('user.index')->with('success', 'Data berhasil diubah');
    }


    public function updateuser(Request $request, User $user)
    {

        $user::where('id', $user->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phoneno' => $request->phoneno,
            'username' => $request->username,
        ]);
        return redirect()->route('user.index')->with('success', 'Data berhasil diubah');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $role = Role::all();
        return view('akun.updatelevel', compact('role', 'user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')
            ->with('success', 'Akun berhasil dihapus');
    }


    public function editprofile(User $user)
    {
        $role = Role::all();
        return view('akun.profile', compact('role', 'user'));
    }
}
