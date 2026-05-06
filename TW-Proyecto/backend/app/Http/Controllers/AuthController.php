<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Mostrar formulario de registro
     */
    public function showRegister()
    {
        return view('register');
    }

    /**
     * Procesar registro de usuario
     */
    public function storeRegister(Request $request)
    {
        // Validar los datos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'terms' => 'required|accepted',
        ], [
            'name.required' => 'El nombre es obligatorio',
            'surname.required' => 'Los apellidos son obligatorios',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email debe ser válido',
            'email.unique' => 'El email ya está registrado',
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'terms.required' => 'Debes aceptar los términos y condiciones',
        ]);

        // Aquí puedes guardar el usuario en la base de datos
        // User::create($validated);

        return redirect()->route('register')->with('success', 'Cuenta creada exitosamente');
    }
}
