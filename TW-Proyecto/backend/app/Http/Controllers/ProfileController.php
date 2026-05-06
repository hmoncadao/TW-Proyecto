<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Mostrar perfil del usuario
     */
    public function show()
    {
        // Aquí podrías obtener los datos del usuario autenticado
        // $user = auth()->user();
        return view('profile');
    }

    /**
     * Actualizar información personal
     */
    public function updatePersonal(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
        ]);

        // Aquí puedes actualizar los datos del usuario
        // auth()->user()->update($validated);

        return redirect()->route('profile')->with('success', 'Perfil actualizado correctamente');
    }

    /**
     * Cambiar contraseña
     */
    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ], [
            'new_password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'new_password.confirmed' => 'Las contraseñas no coinciden',
        ]);

        // Aquí puedes cambiar la contraseña
        // auth()->user()->update(['password' => Hash::make($validated['new_password'])]);

        return redirect()->route('profile')->with('success', 'Contraseña actualizada correctamente');
    }

    /**
     * Actualizar preferencias de notificaciones
     */
    public function updateNotifications(Request $request)
    {
        $notifications = [
            'email_notifications' => $request->has('email_notifications'),
            'news_notifications' => $request->has('news_notifications'),
        ];

        // Aquí puedes guardar las preferencias del usuario
        // auth()->user()->update($notifications);

        return redirect()->route('profile')->with('success', 'Preferencias actualizadas correctamente');
    }
}
