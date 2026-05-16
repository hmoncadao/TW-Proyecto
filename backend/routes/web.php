<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // Se importa el controlador
use App\Http\Controllers\IncidenciaController;

Route::get('/', function () {
    return view('index');
});

// 1. Ruta de Registro 
Route::get('/register', function () {
    return view('register'); 
})->name('register');

// 2. Ruta POST 
Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.store');

// 3. Rutas de Login/Logout
Route::get('/login', [AuthController::class, 'show'])->name('login.show');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/reportar', function () {
    return view('reportarIncidencia'); 
})->name('reportar');

Route::post('/incidencias/guardar', [IncidenciaController::class, 'store'])->name('incidencias.store');

Route::get('/panel', function () {
    return view('panelAyuntamiento'); 
})->name('panel');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');
