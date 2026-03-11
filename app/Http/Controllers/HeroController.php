<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    /**
     * Menampilkan Form Edit Hero
     */
    public function edit()
    {
        // Mencari data Hero dengan ID 1. Jika tidak ada, buat default.
        $hero = Hero::firstOrCreate(['id' => 1], [
            'judul_awal'     => 'Kasir digital simpel buat',
            'highlight_text' => 'RAPIIN',
            'judul_akhir'    => 'bisnis kamu',
            'button'         => 'Tell Me More',
            'image'          => 'hero/default.png'
        ]);

        return view('admin.hero.edit', compact('hero'));
    }

    /**
     * Update Data Hero ke Database
     */
    public function update(Request $request)
    {
        $hero = Hero::findOrFail(1);

        $request->validate([
            'judul_awal'     => 'required|string|max:255',
            'highlight_text' => 'required|string|max:255',
            'judul_akhir'    => 'required|string|max:255',
            'button'         => 'required|string|max:100',
            'image'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only(['judul_awal', 'highlight_text', 'judul_akhir', 'button']);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($hero->image && Storage::disk('public')->exists($hero->image)) {
                Storage::disk('public')->delete($hero->image);
            }
           
            // Simpan gambar baru
            $data['image'] = $request->file('image')->store('hero', 'public');
        }

        $hero->update($data);

        return redirect()->back()->with('success', 'Hero Section berhasil diperbarui!');
    }
}