<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function storeRegister(Request $request)
    {
        // 1. Validar los datos (¡La validación de tu compañero estaba perfecta!)
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

        // 2. Encriptar la contraseña por seguridad
        $validated['password'] = Hash::make($validated['password']);

        // 3. Guardar el usuario en la base de datos (TiDB)
        // Filtramos 'terms' porque no existe como columna en la base de datos
        $user = User::create([
            'name' => $validated['name'],
            'surname' => $validated['surname'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'postal_code' => $validated['postal_code'],
            'password' => $validated['password'],
        ]);

        // 4. Iniciar sesión automáticamente con el usuario recién creado
        Auth::login($user);

        // 5. Redirigir al perfil del usuario
        return redirect('/profile')->with('success', 'Cuenta creada exitosamente');
    }
}
