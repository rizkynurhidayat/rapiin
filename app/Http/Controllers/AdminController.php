<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Hero;

class AdminController extends Controller
{
    public function view() {
        $user = Auth::user();
        $hero = Hero::first(); 
        return view('admin', ["username" => $user->name, "hero" => $hero]);
    }

    public function users(){
        $user = Auth::user();
        $users = User::all();
        $hero = Hero::first();
        return view('users.index', ["username" => $user->name, "users" => $users, "hero" => $hero]);
    }

    public function edit(User $user) {
        $userlogin = Auth::user();
        $hero = Hero::first();
        return view('users.edit', ["username" => $userlogin->name, "user" => $user, "hero" => $hero]);
    }

    public function update(Request $request, User $user) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);
        $user->update($validatedData);
        return redirect()->route('users.index')->with('success', 'Berhasil update user');
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Berhasil hapus user');
    }
}