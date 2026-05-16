<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; // Se importa el controlador
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\ProfileController;

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

Route::get('/incidencias', function () {
    return view('incidencias');
})->name('incidencias');

Route::get('/detalle', function () {
    return view('detalleIncidencia');
})->name('detalle');

// Rutas protegidas de perfil
Route::middleware('auth')->group(function () {
    Route::post('/profile/update-personal', [ProfileController::class, 'updatePersonal'])->name('profile.update.personal');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
    Route::post('/profile/update-notifications', [ProfileController::class, 'updateNotifications'])->name('profile.update.notifications');
});

use App\Http\Controllers\ListaIncidenciaController;

Route::get('/incidencias', [ListaIncidenciaController::class, 'index']);

Route::get('/incidencias/{id}', [ListaIncidenciaController::class, 'show']);

use App\Http\Controllers\PanelController;

Route::get('/panel', [PanelController::class, 'index']);

use App\Http\Controllers\IndexController;

Route::get('/', [IndexController::class, 'index']);