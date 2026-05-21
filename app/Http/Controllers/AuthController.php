<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUserRequest;
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
        // Si el usuario ya está autenticado, redirigirlo index
        if (Auth::check()) {
            return redirect()->route('/');
        }

        return view('login');
    }

    /**
     * Procesar el login
     */
    public function store(LoginRequest $request)
    {
        // Validar los datos
        $credentials = $request->validated();

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
                'password' => 'La contraseña debe ser válida',
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

    public function storeRegister(RegisterUserRequest $request)
    {
        // 1. Validar los datos
        $validated = $request->validated();

        // 2. Encriptar la contraseña por seguridad
        $validated['password'] = Hash::make($validated['password']);

        // 3. Determinar el rol del usuario
        $role = $request->has('is_admin') ? 'admin' : 'usuario';

        // 4. Guardar el usuario en la base de datos (TiDB)
        $user = User::create([
            'name' => $validated['name'],
            'surname' => $validated['surname'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'postal_code' => $validated['postal_code'],
            'password' => $validated['password'],
            'role' => $role,
            'email_verified_at' => now(),
        ]);

        // 5. Iniciar sesión automáticamente con el usuario recién creado
        Auth::login($user);

        // 6. Redirigir al perfil del usuario
        return redirect('/profile')->with('success', 'Cuenta creada exitosamente');
    }
}
