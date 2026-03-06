<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Opsi;

class OpsiController extends Controller
{
    
    public function view() 
    {
        $user = Auth::user();
        $opsi = Opsi::all();
        return view('opsi.index', [
            "opsi" => $opsi,
            "username" => $user ['name']
        ]);
    }
    public function create()
    {
        $user = Auth::user();
        return view('opsi.create', [
            "username" => $user['name']
        ]);
    }
    public function store(Request $request) 
    {
        $validated = $request->validate([
            'image'   =>'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'judul' => 'required|string',
            'teks_button' => 'required|string',
            'title' => 'required|string',
            'isi' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('opsi_images', 'public');
            $validated['image'] = $imagePath;
        }

        Opsi::create($validated);

        return redirect()->route('opsi.index')->with('success', 'Opsi berhasil ditambahkan');
    }


   public function destroy(Opsi $opsi) 
   {
    if($opsi->image && Storage::disk('public')->exists($opsi->image)){
        Storage::disk('public')->delete($opsi->image);
    }
    $opsi->delete();
    return redirect()->route('opsi.index')->with('success', 'Opsi berhasil dihapus');
   }
   public function edit(Opsi $opsi) 
   {
    $user = Auth::user();
    return view('opsi.edit', [
        "opsi" => $opsi,
        "username" => $user ['name']
    ]);
   }
   public function update(Request $request, Opsi $opsi) 
   {
    $validated = $request->validate([
        'image'   =>'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'judul' => 'required|string',
        'teks_button' => 'required|string',
        'title' => 'required|string',
        'isi' => 'required|string',
    ]);

    if ($request->hasFile('image')) {
        if($opsi->image && Storage::disk('public')->exists($opsi->image)){
            Storage::disk('public')->delete($opsi->image);
        }
        $imagePath = $request->file('image')->store('opsi_images', 'public');
        $validated['image'] = $imagePath;
    }

    $opsi->update($validated);

    return redirect()->route('opsi.index')->with('success', 'Opsi berhasil diperbarui');
   }
}