@extends('layouts.app')

@section('content')

<div class="pt-20 pb-20 min-h-screen">
    <div class="max-w-[1280px] mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            
            <!-- Contenido principal - ocupa 3 columnas en desktop -->
            <div class="lg:col-span-3">
                <div class="bg-white dark:bg-slate-900 rounded-lg border border-[#C4C7CF] dark:border-slate-700 p-8">
                    
                    <!-- Encabezado del formulario -->
                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                            Crear Cuenta
                        </h1>
                        <p class="text-slate-600 dark:text-slate-400">
                            Completa todos los campos para crear tu cuenta en GovConnect
                        </p>
                    </div>

                    <!-- Formulario de registro -->
                    <form action="{{ route('register.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Mostrar errores generales si existen -->
                        @if ($errors->any())
                            <div class="bg-red-50 dark:bg-red-900/20 border border-red-300 dark:border-red-700 rounded-lg p-4">
                                <p class="text-sm font-bold text-red-700 dark:text-red-400 mb-2">Por favor, corrija los siguientes errores:</p>
                                <ul class="text-xs text-red-600 dark:text-red-300 list-disc list-inside space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Fila: Nombre y Apellidos -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nombre -->
                            <div class="form-group">
                                <label for="name" class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                                    Nombre <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text"
                                    id="name"
                                    name="name"
                                    required
                                    value="{{ old('name') }}"
                                    placeholder="Juan"
                                    class="w-full px-4 py-2 border @error('name') border-red-500 @else border-slate-300 dark:border-slate-600 @enderror rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent"
                                />
                                @error('name')
                                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Apellidos -->
                            <div class="form-group">
                                <label for="surname" class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                                    Apellidos <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text"
                                    id="surname"
                                    name="surname"
                                    required
                                    value="{{ old('surname') }}"
                                    placeholder="García López"
                                    class="w-full px-4 py-2 border @error('surname') border-red-500 @else border-slate-300 dark:border-slate-600 @enderror rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent"
                                />
                                @error('surname')
                                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email" class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                                Correo Electrónico <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="email"
                                id="email"
                                name="email"
                                required
                                value="{{ old('email') }}"
                                placeholder="tu.email@ejemplo.com"
                                class="w-full px-4 py-2 border @error('email') border-red-500 @else border-slate-300 dark:border-slate-600 @enderror rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent"
                            />
                            @error('email')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Teléfono -->
                        <div class="form-group">
                            <label for="phone" class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                                Teléfono <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="tel"
                                id="phone"
                                name="phone"
                                required
                                value="{{ old('phone') }}"
                                placeholder="+34 123 456 789"
                                class="w-full px-4 py-2 border @error('phone') border-red-500 @else border-slate-300 dark:border-slate-600 @enderror rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent"
                            />
                            @error('phone')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Dirección -->
                        <div class="form-group">
                            <label for="address" class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                                Dirección <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text"
                                id="address"
                                name="address"
                                required
                                value="{{ old('address') }}"
                                placeholder="Calle Principal, 123"
                                class="w-full px-4 py-2 border @error('address') border-red-500 @else border-slate-300 dark:border-slate-600 @enderror rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent"
                            />
                            @error('address')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Fila: Ciudad, Código Postal -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Ciudad -->
                            <div class="form-group">
                                <label for="city" class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                                    Ciudad <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text"
                                    id="city"
                                    name="city"
                                    required
                                    value="{{ old('city') }}"
                                    placeholder="Madrid"
                                    class="w-full px-4 py-2 border @error('city') border-red-500 @else border-slate-300 dark:border-slate-600 @enderror rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent"
                                />
                                @error('city')
                                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Código Postal -->
                            <div class="form-group">
                                <label for="postal_code" class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                                    Código Postal <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text"
                                    id="postal_code"
                                    name="postal_code"
                                    required
                                    value="{{ old('postal_code') }}"
                                    placeholder="28001"
                                    class="w-full px-4 py-2 border @error('postal_code') border-red-500 @else border-slate-300 dark:border-slate-600 @enderror rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent"
                                />
                                @error('postal_code')
                                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
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
                                placeholder="Mínimo 8 caracteres"
                                class="w-full px-4 py-2 border @error('password') border-red-500 @else border-slate-300 dark:border-slate-600 @enderror rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent"
                            />
                            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">La contraseña debe tener al menos 8 caracteres</p>
                            @error('password')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirmar contraseña -->
                        <div class="form-group">
                            <label for="password_confirmation" class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                                Confirmar Contraseña <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                required
                                minlength="8"
                                placeholder="Repite tu contraseña"
                                class="w-full px-4 py-2 border @error('password_confirmation') border-red-500 @else border-slate-300 dark:border-slate-600 @enderror rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent"
                            />
                            @error('password_confirmation')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Aceptar términos -->
                        <div class="form-group flex items-start gap-3 @error('terms') bg-red-50 dark:bg-red-900/20 p-3 rounded @enderror">
                            <input 
                                type="checkbox"
                                id="terms"
                                name="terms"
                                required
                                {{ old('terms') ? 'checked' : '' }}
                                class="mt-1 w-4 h-4 accent-[#1B365D] cursor-pointer"
                            />
                            <div>
                                <label for="terms" class="text-sm text-slate-600 dark:text-slate-400 cursor-pointer">
                                    Acepto los <a href="#" class="text-[#1B365D] dark:text-blue-400 font-bold hover:underline">términos y condiciones</a> y la <a href="#" class="text-[#1B365D] dark:text-blue-400 font-bold hover:underline">política de privacidad</a> <span class="text-red-500">*</span>
                                </label>
                                @error('terms')
                                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="flex flex-col md:flex-row gap-4 pt-6 border-t border-slate-200 dark:border-slate-700">
                            <button 
                                type="submit"
                                class="flex-1 px-6 py-3 bg-[#1B365D] text-white font-bold rounded-lg hover:opacity-90 active:scale-95 transition-all"
                            >
                                Crear Cuenta
                            </button>
                            <a 
                                href="/"
                                class="flex-1 px-6 py-3 bg-slate-200 dark:bg-slate-700 text-slate-900 dark:text-white font-bold rounded-lg hover:bg-slate-300 dark:hover:bg-slate-600 active:scale-95 transition-all text-center"
                            >
                                Cancelar
                            </a>
                        </div>

                        <!-- Enlace a login -->
                        <div class="text-center pt-4">
                            <p class="text-sm text-slate-600 dark:text-slate-400">
                                ¿Ya tienes cuenta? 
                                <a href="{{ route('login.show') }}" class="text-[#1B365D] dark:text-blue-400 font-bold hover:underline">Inicia sesión aquí</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Barra lateral - información adicional -->
            <div class="lg:col-span-1">
                <div class="bg-white dark:bg-slate-900 rounded-lg border border-[#C4C7CF] dark:border-slate-700 p-6 sticky top-20">
                    <h3 class="text-lg font-bold text-[#1B365D] dark:text-blue-400 mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined">info</span>
                        Información
                    </h3>
                    
                    <div class="space-y-4">
                        <div class="bg-blue-50 dark:bg-slate-800 p-4 rounded-lg border-l-4 border-[#1B365D]">
                            <p class="text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-1">¿Qué necesitas?</p>
                            <p class="text-xs text-slate-600 dark:text-slate-400">
                                Todos los campos marcados con <span class="text-red-500 font-bold">*</span> son obligatorios.
                            </p>
                        </div>

                        <div class="bg-green-50 dark:bg-slate-800 p-4 rounded-lg border-l-4 border-green-500">
                            <p class="text-sm font-bold text-green-700 dark:text-green-400 mb-1">Seguridad</p>
                            <p class="text-xs text-slate-600 dark:text-slate-400">
                                Tu contraseña debe tener al menos 8 caracteres.
                            </p>
                        </div>

                        <div class="bg-amber-50 dark:bg-slate-800 p-4 rounded-lg border-l-4 border-amber-500">
                            <p class="text-sm font-bold text-amber-700 dark:text-amber-400 mb-1">Verificación</p>
                            <p class="text-xs text-slate-600 dark:text-slate-400">
                                Recibirás un email de confirmación después del registro.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection