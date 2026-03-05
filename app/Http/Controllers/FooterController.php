<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FooterController extends Controller
{
    public function index()
    {
        $footers = Footer::all();
        return view('footer.index', compact('footers'));
    }

    public function create()
    {
        return view('footer.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'twitter' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
        ]);

        Footer::create($validated);

        return redirect()->route('footer.index')->with('success', 'Footer berhasil ditambahkan');
    }

    public function edit(Footer $footer)
    {
        return view('footer.edit', compact('footer'));
    }

    public function update(Request $request, Footer $footer)
    {
        $validated = $request->validate([
            'twitter' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
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
