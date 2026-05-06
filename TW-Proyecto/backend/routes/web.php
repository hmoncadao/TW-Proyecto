<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('main');
});

// Rutas de autenticación (públicas)
Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'storeRegister')->name('register.store');
});

// Rutas de perfil (protegidas)
Route::middleware('auth')->controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'show')->name('profile');
    Route::post('/profile/personal', 'updatePersonal')->name('profile.update.personal');
    Route::post('/profile/password', 'updatePassword')->name('profile.update.password');
    Route::post('/profile/notifications', 'updateNotifications')->name('profile.update.notifications');
});