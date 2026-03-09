<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\PricingController;

// --- HALAMAN DEPAN ---
Route::get('/', [PricingController::class, 'index'])->name('home');

// --- AUTH GUEST ---
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// --- ADMIN AREA (AUTH) ---
Route::middleware('auth')->group(function () {
    // Dashboard & Logout
    Route::get('/admin', [AdminController::class, 'view'])->name('admin');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Management User (Punya Teman)
    Route::get('/users', [AdminController::class, 'users'])->name('users.index');
    Route::get('/users/{user}/edit', [AdminController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [AdminController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('users.destroy');

    // Management Hero & Pricing (Punya Anda - Menggunakan Prefix Admin)
    Route::name('admin.')->group(function () {
        // Hero
        Route::get('/admin/hero/edit', [HeroController::class, 'edit'])->name('hero.edit');
        Route::put('/admin/hero/update', [HeroController::class, 'update'])->name('hero.update');

        // Pricing
        Route::get('/admin/pricing', [PricingController::class, 'adminIndex'])->name('pricing.index');
        Route::get('/admin/pricing/{id}/edit', [PricingController::class, 'edit'])->name('pricing.edit');
        Route::put('/admin/pricing/{id}', [PricingController::class, 'update'])->name('pricing.update');
    });
});

    //     // --- FREE TRIAL (WHATSAPP REDIRECT) ---
    // Route::get('/freetrial', function () {
    //     // Memanggil file di resources/views/form/form.blade.php
    //     return view('form.form'); 
    // })->name('freetrial');

    // Route::post('/freetrial/send', function (Illuminate\Http\Request $request) {
    //     $namaToko = $request->input('nama_toko');
    //     $email = $request->input('email');
        
    //     // GANTI dengan nomor WA Admin Anda (Gunakan format 62)
    //     $nomorAdmin = '6281225006338'; 

    //     // Template Chat Opsi 1
    //     $pesan = "*Halo Admin Techade.id,*\n\n" .
    //             "Saya tertarik untuk mencoba *Free Trial 14 Hari* untuk sistem POS. Berikut data pendaftaran saya:\n\n" .
    //             "• *Nama Bisnis:* " . $namaToko . "\n" .
    //             "• *Email:* " . $email . "\n\n" .
    //             "Mohon bantuannya untuk dibuatkan akun aksesnya agar saya bisa mulai mencoba fiturnya. Terima kasih!";

    //     $urlWA = "https://api.whatsapp.com/send?phone=" . $nomorAdmin . "&text=" . urlencode($pesan);

    //     return redirect()->away($urlWA);
    // })->name('freetrial.send');
