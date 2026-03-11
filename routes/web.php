<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OpsiController;
use App\Http\Controllers\FooterController;

Route::get('/', function () {
    return view('index');
});
Route::get('/admin', function () {
    return view('admin');
});
Route::get('/login', function () {
    return view('auth.login');
});

//route guest
Route::middleware('guest')->group(function () {
    //route login
    Route::get('/login', [AuthController::class, 'showLoginForm']) ->name('login');
    Route::post('/login', [AuthController::class, 'login']) ->name('login');
    
    //route register
    Route::get('/register', [AuthController::class, 'showRegisterForm']) ->name('register');
    Route::post('/register', [AuthController::class, 'register']) ->name('register');

    //route landing page
    // Route::get('/', [HomeController::class, 'view']);
    // Route::post('/message', [MessageController::class, 'store']) -> name('message.store');
    });

//middleware auth admin
Route::middleware('auth')->group(function () {
    //route admin dashboard
    Route::get('/admin',[AdminController::class, 'view']) -> name('admin');


    //route logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/users', [AdminController::class, 'users'] ) -> name('users.index');
    Route::get('/users/{user}/edit', [AdminController::class, 'edit'] ) -> name('users.edit');
    Route::put('/users/{user}', [AdminController::class, 'update'] ) -> name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'destroy'] ) -> name('users.destroy');

    //route opsi
   Route::get('/opsi', [OpsiController::class, 'view'])->name('opsi.index');
   Route::get('/opsi/create', [OpsiController::class, 'create'])->name('opsi.create');
   Route::post('/opsi/create', [OpsiController::class, 'store'])->name('opsi.store');
   Route::get('/opsi/edit/{opsi}', [OpsiController::class, 'edit'])->name('opsi.edit');
   Route::put('/opsi/edit/{opsi}', [OpsiController::class, 'update'])->name('opsi.update');
   Route::delete('/opsi/{opsi}', [OpsiController::class, 'destroy'])->name('opsi.destroy');

    //route footer
    Route::get('/footer', [FooterController::class, 'index'])->name('footer.index');
    Route::get('/footer/create', [FooterController::class, 'create'])->name('footer.create');
    Route::post('/footer/create', [FooterController::class, 'store'])->name('footer.store');
    Route::get('/footer/edit/{footer}', [FooterController::class, 'edit'])->name('footer.edit');
    Route::put('/footer/edit/{footer}', [FooterController::class, 'update'])->name('footer.update');
    Route::delete('/footer/{footer}', [FooterController::class, 'destroy'])->name('footer.destroy');

});