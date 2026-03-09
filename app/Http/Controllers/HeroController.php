<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class HeroController extends Controller
{
    public function edit()
    {
        // Ambil data user login agar Navbar tidak error
        $username = Auth::user()->name;

        // Ambil data hero ID 1
        $hero = Hero::firstOrCreate(['id' => 1], [
            'judul_awal'     => 'Kasir digital simpel buat',
            'highlight_text' => 'RAPIIN',
            'judul_akhir'    => 'bisnis kamu',
            'button'         => 'Mulai Sekarang', // Kita pakai 'button' saja
            'image'          => 'hero/default.png'
        ]);

        return view('admin.hero.edit', compact('hero', 'username'));
    }

    public function update(Request $request)
    {
        $hero = Hero::firstOrCreate(['id' => 1]);

        $request->validate([
            'judul_awal'     => 'required',
            'highlight_text' => 'required',
            'judul_akhir'    => 'required',
            'button'         => 'required', // Deskripsi sudah tidak ada, ganti jadi button
            'image'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Ambil data yang hanya ada di database
        $data = $request->only(['judul_awal', 'highlight_text', 'judul_akhir', 'button']);

        if ($request->hasFile('image')) {
            if ($hero->image && $hero->image !== 'hero/default.png' && Storage::disk('public')->exists($hero->image)) {
                Storage::disk('public')->delete($hero->image);
            }
            $data['image'] = $request->file('image')->store('hero', 'public');
        }

        $hero->update($data);

        return redirect()->back()->with('success', 'Hero Section berhasil diperbarui!');
    }
}