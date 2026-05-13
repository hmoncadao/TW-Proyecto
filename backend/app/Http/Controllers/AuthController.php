<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Mostrar el formulario de login
     */
    public function show()
    {
        // Si el usuario ya está autenticado, redirigirlo al panel
        if (Auth::check()) {
            return redirect()->route('panel');
        }

        return view('login');
    }

    /**
     * Procesar el login
     */
    public function store(Request $request)
    {
        // Validar los datos
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ], [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser válido.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
            // Regenerar la sesión para prevenir session fixation
            $request->session()->regenerate();

            // Redirigir al usuario a la página que intentaba acceder o al panel
            return redirect()->intended(route('panel'))
                ->with('success', 'Bienvenido de vuelta, ' . Auth::user()->name);
        }

        // Si la autenticación falla, redirigir de vuelta con errores
        return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => 'Las credenciales no coinciden con nuestros registros.',
            ]);
    }

    /**
     * Cerrar sesión
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidar la sesión
        $request->session()->invalidate();

        // Regenerar el token CSRF
        $request->session()->regenerateToken();

        return redirect(route('login.show'))
            ->with('success', 'Has cerrado sesión correctamente.');
    }

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
