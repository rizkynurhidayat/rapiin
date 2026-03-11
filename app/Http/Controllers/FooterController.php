<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FooterController extends Controller
{
    public function index()
    {
        $footers = Footer::all();
        $username = Auth::user()->name;
        return view('footer.index', compact('footers', 'username'));
    }

    public function create()
    {
        return view('footer.create', [
            'username' => Auth::user()->name
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
           'facebook' => 'nullable|string|max:255',
           'instagram' => 'nullable|string|max:255',
           'twitter' => 'nullable|string|max:255',
           'linkedin' => 'nullable|string|max:255',
           'whatsapp' => 'nullable|string|max:255',
           'tiktok' => 'nullable|string|max:255',
           'email' => 'nullable|email|max:255',
           'kontak' => 'nullable|string|max:20',
           'alamat' => 'nullable|string|max:255',
           'latitude' => 'nullable|string',
           'longitude' => 'nullable|string',
        ]);

        Footer::create($validated);

        return redirect()->route('footer.index')->with('success', 'Footer berhasil ditambahkan');
    }

    public function edit(Footer $footer)
    {
        return view('footer.edit', [
            "footer" => $footer,
            "username" => Auth::user()->name
        ]);
    }

    public function update(Request $request, Footer $footer)
    {
        $validated = $request->validate([
              'facebook' => 'nullable|string|max:255',
              'instagram' => 'nullable|string|max:255',
              'twitter' => 'nullable|string|max:255',
              'linkedin' => 'nullable|string|max:255',
              'whatsapp' => 'nullable|string|max:255',
              'tiktok' => 'nullable|string|max:255',
              'email' => 'nullable|email|max:255',
              'kontak' => 'nullable|string|max:20',
              'alamat' => 'nullable|string|max:255',
              // TAMBAHKAN INI JUGA DI UPDATE
              'latitude' => 'nullable|string',
              'longitude' => 'nullable|string',
        ]);

        $footer->update($validated);

        return redirect()->route('footer.index')->with('success', 'Footer berhasil diperbarui');
    }

    public function destroy(Footer $footer)
    {
        $footer->delete();
        return redirect()->route('footer.index')->with('success', 'Footer berhasil dihapus');
    }
}