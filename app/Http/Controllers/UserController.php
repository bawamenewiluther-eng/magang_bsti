<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $users = User::all();

        return view('users', compact('users'));
    }

    // Menambah data
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>$request->password
        ]);

        return "User berhasil ditambahkan";
    }

    // Menampilkan satu data
    public function show($id)
    {
        return User::find($id);
    }

    // Mengedit data
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return "User berhasil diupdate";
    }

    // Menghapus data
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return "User berhasil dihapus";
    }
}