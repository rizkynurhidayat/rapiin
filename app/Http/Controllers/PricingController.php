<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Pricing;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PricingController extends Controller
{
    /**
     * Menampilkan Landing Page (Halaman Depan)
     */
    public function index()
    {
        $hero = Hero::first();
        $pricings = Pricing::all();
        $footer = Footer::latest()->first();

        return view('index', compact('hero', 'pricings', 'footer'));
    }

    /**
     * Menampilkan Daftar Paket di Dashboard Admin
     */
    public function adminIndex()
    {
        $username = Auth::user()->name;
        $pricings = Pricing::all();
        $hero = Hero::first(); // Dibutuhkan jika Sidebar memanggil data logo/hero

        return view('admin.pricing.index', compact('pricings', 'username', 'hero'));
    }

    /**
     * Menampilkan Form Edit Paket
     */
    public function edit($id)
    {
        $username = Auth::user()->name;
        $pricing = Pricing::findOrFail($id);
        $hero = Hero::first();

        return view('admin.pricing.edit', compact('pricing', 'username', 'hero'));
    }

    /**
     * Memproses Update Data Paket
     */
   public function update(Request $request, $id)
{
    $pricing = Pricing::findOrFail($id);

    // 1. Validasi Input Dasar
    $request->validate([
        'nama_paket'    => 'required',
        'deskripsi'     => 'required',
        'harga_lengkap' => 'required',
        'teks_button'   => 'required',
        'fitur'         => 'required',
        'icon'          => 'nullable|image|mimes:png,jpg,jpeg|max:1024',
    ]);

    $data = $request->all();

    // --- LOGIKA HAPUS ICON (TAMBAHKAN INI) ---
    if ($request->has('remove_icon') && $pricing->icon) {
        if (Storage::disk('public')->exists($pricing->icon)) {
            Storage::disk('public')->delete($pricing->icon);
        }
        $data['icon'] = null; // Set di database jadi null
    }

    // 2. Logika Khusus Header Section (ID 1)
    if ($id == 1) {
        $request->validate([
            'section_judul_awal'     => 'required',
            'section_highlight_text' => 'required',
            'section_judul_akhir'    => 'required',
            'section_sub_judul'      => 'required',
        ]);
    } else {
        unset($data['section_judul_awal'], $data['section_highlight_text'], $data['section_judul_akhir'], $data['section_sub_judul']);
    }

    // 3. Logika Upload Icon Baru
    if ($request->hasFile('icon')) {
        if ($pricing->icon && Storage::disk('public')->exists($pricing->icon)) {
            Storage::disk('public')->delete($pricing->icon);
        }
        $data['icon'] = $request->file('icon')->store('pricing-icons', 'public');
    }

    // 4. Update Database
    $pricing->update($data);

    return redirect()->route('admin.pricing.index')->with('success', 'Paket berhasil diperbarui!');
}
}