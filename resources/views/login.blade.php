@extends('layouts.app')

@section('content')

<div class="pt-36 lg:pt-20 pb-20 min-h-screen">
    <div class="max-w-[1280px] mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            
            <!-- Contenido principal - ocupa 3 columnas en desktop -->
            <div class="lg:col-span-3">
                <div class="bg-white dark:bg-slate-900 rounded-lg border border-[#C4C7CF] dark:border-slate-700 p-8">
                    
                    <!-- Encabezado del formulario -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                            Iniciar Sesión
                        </h1>
                        <p class="text-slate-600 dark:text-slate-400">
                            Ingresa tus credenciales para acceder a tu cuenta en GovConnect
                        </p>
                    </div>

                    <!-- Formulario de login -->
                    <form action="{{ route('login.store') }}" method="POST" class="space-y-6" novalidate>
                        @csrf

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email" class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                                Correo Electrónico <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                placeholder="tu.email@ejemplo.com"
                                class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent @error('email') border-red-500 @enderror"
                            />
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                                Contraseña <span class="text-red-500">*</span>
                            </label>

                            <div class="relative">
                                <input 
                                    type="password"
                                    id="password"
                                    name="password"
                                    required
                                    minlength="8"
                                    placeholder="Tu contraseña"
                                    class="w-full px-4 py-2 pr-28 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent @error('password') border-red-500 @enderror"
                                />

                                <button 
                                    type="button"
                                    onclick="togglePassword()"
                                    id="toggleBtn"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-sm text-gray-500 font-semibold"
                                >
                                    Ver contraseña
                                </button>
                            </div>

                            @error('password')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Botón de envío -->
                        <div class="pt-4">
                            <button 
                                type="submit"
                                class="w-full bg-[#1B365D] hover:bg-[#152849] dark:bg-blue-600 dark:hover:bg-blue-700 text-white font-bold py-3 rounded-lg transition duration-200"
                            >
                                Iniciar Sesión
                            </button>
                        </div>
                    </form>

                    <!-- Link de registro -->
                    <div class="mt-6 text-center">
                        <p class="text-slate-600 dark:text-slate-400">
                            ¿No tienes cuenta? 
                            <a href="{{ route('register') }}" class="text-[#1B365D] dark:text-blue-400 font-bold hover:underline">
                                Crear cuenta
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    const input = document.getElementById('password');
    const btn = document.getElementById('toggleBtn');

    if (input.type === 'password') {
        input.type = 'text';
        btn.innerText = 'Ocultar contraseña';
    } else {
        input.type = 'password';
        btn.innerText = 'Ver contraseña';
    }
}
</script>
@endsection