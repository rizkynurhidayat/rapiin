<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\FooterController;


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

    //route logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/users', [AdminController::class, 'users'] ) -> name('users.index');
    Route::get('/users/{user}/edit', [AdminController::class, 'edit'] ) -> name('users.edit');
    Route::put('/users/{user}', [AdminController::class, 'update'] ) -> name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'destroy'] ) -> name('users.destroy');

    //route footer
    Route::get('/footer', [FooterController::class, 'index'])->name('footer.index');
    Route::get('/footer/edit/{footer}', [FooterController::class, 'edit'])->name('footer.edit');
    Route::put('/footer/edit/{footer}', [FooterController::class, 'update'])->name('footer.update');
});