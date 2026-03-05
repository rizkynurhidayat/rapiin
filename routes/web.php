<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

    Route::get('/users', [AdminController::class, 'users'] ) -> name('users.index');
    Route::get('/users/{user}/edit', [AdminController::class, 'edit'] ) -> name('users.edit');
    Route::put('/users/{user}', [AdminController::class, 'update'] ) -> name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'destroy'] ) -> name('users.destroy');
});