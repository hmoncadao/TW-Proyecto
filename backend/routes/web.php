<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactoController;

Route::get('/', [IndexController::class, 'index']);

// Ruta de Registro 
Route::get('/register', function () {
    return view('register'); 
})->name('register');

// Ruta POST de Registro
Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.store');

// Rutas de Login/Logout
Route::get('/login', [AuthController::class, 'show'])->name('login.show');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas de Reportar Incidencias
Route::get('/reportar', function () {
    return view('reportarIncidencia'); 
})->name('reportar');

// Ruta POST para guardar la incidencia
Route::post('/incidencias/guardar', [IncidenciaController::class, 'store'])->name('incidencias.store');

// Ruta del Panel
Route::get('/panel', [PanelController::class, 'index'])->name('panel');

// Rutas de Contacto
Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');

// Rutas de Perfil
Route::get('/profile', function () {
    return view('profile');
})->name('profile');

// Rutas de Incidencias
Route::get('/incidencias', [IncidenciaController::class, 'index'])->name('incidencias');

// Ruta de Detalle de Incidencia
Route::get('/detalle', function () {
    return view('detalleIncidencia');
})->name('detalle');

// Rutas protegidas de perfil
Route::middleware('auth')->group(function () {
    Route::post('/profile/update-personal', [ProfileController::class, 'updatePersonal'])->name('profile.update.personal');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
    Route::post('/profile/update-notifications', [ProfileController::class, 'updateNotifications'])->name('profile.update.notifications');
});
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/incidencias', [AdminController::class, 'index'])->name('incidencias');
    Route::post('/incidencias/{id}/estado', [AdminController::class, 'updateEstado'])->name('incidencias.estado');
    Route::delete('/incidencias/{id}', [AdminController::class, 'destroy'])->name('incidencias.destroy');
    Route::delete('/mensajes/{id}', [AdminController::class, 'destroyMensaje'])->name('mensajes.destroy');
});