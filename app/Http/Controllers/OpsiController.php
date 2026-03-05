<?php

namespace App\Http\Controllers;

use App\Models\Opsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OpsiController extends Controller
{
    public function view()
    {
        return view('opsi.index', [
            'opsis' => Opsi::all(),
            'username' => Auth::user()['name']
        ]);
    }

    public function create()
    {
        return view('opsi.create', [
            'username' => Auth::user()['name']
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'button' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('opsi_images', 'public');
        }

        Opsi::create($validated);

        return redirect()->route('opsi.index')->with('success', 'Opsi berhasil ditambahkan');
    }

    public function edit(Opsi $opsi)
    {
        return view('opsi.edit', [
            'opsi' => $opsi,
            'username' => Auth::user()['name']
        ]);
    }

    public function update(Request $request, Opsi $opsi)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'button' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($opsi->image && Storage::disk('public')->exists($opsi->image)) {
                Storage::disk('public')->delete($opsi->image);
            }

            $validated['image'] = $request->file('image')->store('opsi_images', 'public');
        }

        $opsi->update($validated);

        return redirect()->route('opsi.index')->with('success', 'Opsi berhasil diperbarui');
    }

    public function destroy(Opsi $opsi)
    {
        if ($opsi->image && Storage::disk('public')->exists($opsi->image)) {
            Storage::disk('public')->delete($opsi->image);
        }

        $opsi->delete();

        return redirect()->route('opsi.index')->with('success', 'Opsi berhasil dihapus');
    }
}