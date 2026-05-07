<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // Se importa el controlador

Route::get('/', function () {
    return view('main');
});

// 1. Ruta de Registro 
Route::get('/register', function () {
    return view('register'); 
})->name('register');

// 2. Ruta POST 
Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.store');

// 3. Ruta de Login 
Route::get('/login', function () {
    return view('login'); 
})->name('login');

// 4. Ruta de Logout 
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/reportar', function () {
    return view('reportarIncidencia'); 
})->name('reportar');
