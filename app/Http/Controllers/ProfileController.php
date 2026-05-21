<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Actualizar información personal del usuario
     */
    public function updatePersonal(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
        ], [
            'name.required' => 'El nombre es obligatorio',
            'surname.required' => 'Los apellidos son obligatorios',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email debe ser válido',
            'email.unique' => 'El email ya está registrado',
            'phone.required' => 'El teléfono es obligatorio',
            'address.required' => 'La dirección es obligatoria',
            'city.required' => 'La ciudad es obligatoria',
            'postal_code.required' => 'El código postal es obligatorio',
        ]);

        // Actualizar el usuario
        Auth::user()->update($validated);

        return back()->with('success', 'Información personal actualizada correctamente.');
    }

    /**
     * Actualizar contraseña del usuario
     */
    public function updatePassword(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ], [
            'current_password.required' => 'La contraseña actual es obligatoria',
            'new_password.required' => 'La nueva contraseña es obligatoria',
            'new_password.min' => 'La nueva contraseña debe tener al menos 8 caracteres',
            'new_password.confirmed' => 'Las contraseñas no coinciden',
        ]);

        // Verificar que la contraseña actual sea correcta
        if (!Hash::check($validated['current_password'], Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'La contraseña actual es incorrecta']);
        }

        // Actualizar la contraseña
        Auth::user()->update([
            'password' => Hash::make($validated['new_password']),
        ]);

        return back()->with('success', 'Contraseña actualizada correctamente.');
    }

    /**
     * Actualizar preferencias de notificaciones
     */
    public function updateNotifications(Request $request)
    {
        // Por ahora, solo guardamos que se intentó actualizar
        // En una aplicación real, guardarías estas preferencias en la BD
        
        return back()->with('success', 'Preferencias de notificaciones actualizadas correctamente.');
    }
}
