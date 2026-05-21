@extends('layouts.app')

@section('content')

<main id="main-content" aria-label="Página de inicio de sesión"
      class="pt-36 lg:pt-20 pb-20 min-h-screen">

    <div class="max-w-[1280px] mx-auto px-6">

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

            <!-- Contenido principal - ocupa 3 columnas -->
            <div class="lg:col-span-3">

                <div class="bg-white dark:bg-slate-900 rounded-lg border border-[#C4C7CF] dark:border-slate-700 p-8">

                    <!-- Encabezado -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                            Iniciar Sesión
                        </h1>
                        <p class="text-slate-600 dark:text-slate-400">
                            Ingresa tus credenciales para acceder a tu cuenta en GovConnect
                        </p>
                    </div>

                    <!-- Form -->
                    <form action="{{ route('login.store') }}"
                          method="POST"
                          class="space-y-6"
                          novalidate>
                        @csrf

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email"
                                   class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                                Correo Electrónico <span class="text-red-500">*</span>
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email"
                                aria-describedby="email-error"
                                placeholder="tu.email@ejemplo.com"
                                class="w-full px-4 py-2 border rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent
                                @error('email') border-red-500 @else border-slate-300 dark:border-slate-600 @enderror"
                            />

                            @error('email')
                                <p id="email-error" class="text-red-500 text-sm mt-1" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="password"
                                   class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                                Contraseña <span class="text-red-500">*</span>
                            </label>

                            <div class="relative">

                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    required
                                    minlength="8"
                                    autocomplete="current-password"
                                    aria-describedby="password-error"
                                    placeholder="Tu contraseña"
                                    class="w-full px-4 py-2 pr-28 border rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent
                                    @error('password') border-red-500 @else border-slate-300 dark:border-slate-600 @enderror"
                                />

                                <button
                                    type="button"
                                    onclick="togglePassword()"
                                    id="toggleBtn"
                                    aria-pressed="false"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-sm text-gray-500 font-semibold"
                                >
                                    Ver contraseña
                                </button>

                            </div>

                            @error('password')
                                <p id="password-error" class="text-red-500 text-sm mt-1" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Submit -->
                        <div class="pt-4">
                            <button
                                type="submit"
                                class="w-full bg-[#1B365D] hover:bg-[#152849] dark:bg-blue-600 dark:hover:bg-blue-700 text-white font-bold py-3 rounded-lg transition duration-200"
                            >
                                Iniciar Sesión
                            </button>
                        </div>

                    </form>

                    <!-- Register link -->
                    <div class="mt-6 text-center">
                        <p class="text-slate-600 dark:text-slate-400">
                            ¿No tienes cuenta?
                            <a href="{{ route('register') }}"
                               class="text-[#1B365D] dark:text-blue-400 font-bold hover:underline">
                                Crear cuenta
                            </a>
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>

</main>

<script>
function togglePassword() {
    const input = document.getElementById('password');
    const btn = document.getElementById('toggleBtn');

    const isHidden = input.type === 'password';

    input.type = isHidden ? 'text' : 'password';
    btn.innerText = isHidden ? 'Ocultar contraseña' : 'Ver contraseña';
    btn.setAttribute('aria-pressed', isHidden ? 'true' : 'false');
}
</script>

@endsection