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

                        <!-- Contraseña -->
                        <div class="form-group">
                            <label for="password" class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                                Contraseña <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="password"
                                id="password"
                                name="password"
                                required
                                minlength="8"
                                placeholder="Tu contraseña"
                                class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent @error('password') border-red-500 @enderror"
                            />

                            <button 
                                type="button"
                                onclick="togglePassword()"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-500 hover:text-slate-700 dark:hover:text-white"
                            >
                                <!-- Icono ojo -->
                                <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.964-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>
                            
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

@endsection