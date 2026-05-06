@extends('layouts.app')

@section('content')

<div class="pt-20 pb-20 min-h-screen">
    <div class="max-w-[1280px] mx-auto px-6">
        
        <!-- Encabezado del perfil -->
        <div class="bg-white dark:bg-slate-900 rounded-lg border border-[#C4C7CF] dark:border-slate-700 p-8 mb-6">
            <div class="flex flex-col md:flex-row items-center gap-6">
                <!-- Foto de perfil -->
                <div class="flex-shrink-0">
                    <div class="w-32 h-32 rounded-full bg-gradient-to-br from-[#1B365D] to-slate-400 border-4 border-slate-200 dark:border-slate-700 flex items-center justify-center overflow-hidden">
                        <span class="material-symbols-outlined text-white text-6xl">person</span>
                    </div>
                </div>

                <!-- Información del usuario -->
                <div class="flex-1 text-center md:text-left">
                    <h1 class="text-3xl font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                        Javier Maestre
                    </h1>
                    <p class="text-slate-600 dark:text-slate-400 mb-4">
                        javimacer1@gmail.com
                    </p>
                    <div class="flex flex-wrap gap-3 justify-center md:justify-start">
                        <span class="text-sm font-bold text-white bg-[#1B365D] px-4 py-2 rounded-full">
                            Usuario verificado
                        </span>
                        <span class="text-sm font-bold text-slate-600 bg-slate-200 dark:bg-slate-700 dark:text-slate-300 px-4 py-2 rounded-full">
                            Miembro desde 2024
                        </span>
                    </div>
                </div>

                <!-- Botones de acción -->
                <div class="flex flex-col gap-2">
                    <button class="px-6 py-2 bg-[#1B365D] text-white font-bold rounded-lg hover:opacity-90 active:scale-95 transition-all">
                        Editar Perfil
                    </button>
                    <button class="px-6 py-2 bg-slate-200 dark:bg-slate-700 text-slate-900 dark:text-white font-bold rounded-lg hover:bg-slate-300 dark:hover:bg-slate-600 active:scale-95 transition-all">
                        Cambiar Contraseña
                    </button>
                </div>
            </div>
        </div>

        <!-- Contenido principal -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- Panel principal -->
            <div class="lg:col-span-2">
                
                <!-- Información Personal -->
                <div class="bg-white dark:bg-slate-900 rounded-lg border border-[#C4C7CF] dark:border-slate-700 p-8 mb-6">
                    <h2 class="text-2xl font-bold text-[#1B365D] dark:text-blue-400 mb-6 flex items-center gap-2">
                        <span class="material-symbols-outlined">person_outline</span>
                        Información Personal
                    </h2>

                    <form action="{{ route('profile.update.personal') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Fila: Nombre y Apellidos -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="form-group">
                                <label for="name" class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                                    Nombre <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text"
                                    id="name"
                                    name="name"
                                    required
                                    value="Javier"
                                    class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent"
                                />
                            </div>

                            <div class="form-group">
                                <label for="surname" class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                                    Apellidos <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text"
                                    id="surname"
                                    name="surname"
                                    required
                                    value="Maestre Cerdeño"
                                    class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent"
                                />
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
                                value="javimacer1@gmail.com"
                                class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent"
                            />
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
                                value="+34 626 197 003"
                                class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent"
                            />
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
                                value="Calle Gonzalo Gallas, 23"
                                class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent"
                            />
                        </div>

                        <!-- Fila: Ciudad, Código Postal -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="form-group">
                                <label for="city" class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                                    Ciudad <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text"
                                    id="city"
                                    name="city"
                                    required
                                    value="Granada"
                                    class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent"
                                />
                            </div>

                            <div class="form-group">
                                <label for="postal_code" class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                                    Código Postal <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text"
                                    id="postal_code"
                                    name="postal_code"
                                    required
                                    value="18003"
                                    class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent"
                                />
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="flex flex-col md:flex-row gap-4 pt-6 border-t border-slate-200 dark:border-slate-700">
                            <button 
                                type="submit"
                                class="flex-1 px-6 py-3 bg-[#1B365D] text-white font-bold rounded-lg hover:opacity-90 active:scale-95 transition-all"
                            >
                                Guardar Cambios
                            </button>
                            <button 
                                type="reset"
                                class="flex-1 px-6 py-3 bg-slate-200 dark:bg-slate-700 text-slate-900 dark:text-white font-bold rounded-lg hover:bg-slate-300 dark:hover:bg-slate-600 active:scale-95 transition-all"
                            >
                                Cancelar
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Seguridad y Privacidad -->
                <div class="bg-white dark:bg-slate-900 rounded-lg border border-[#C4C7CF] dark:border-slate-700 p-8">
                    <h2 class="text-2xl font-bold text-[#1B365D] dark:text-blue-400 mb-6 flex items-center gap-2">
                        <span class="material-symbols-outlined">security</span>
                        Seguridad y Privacidad
                    </h2>

                    <!-- Cambiar contraseña -->
                    <div class="mb-8 pb-8 border-b border-slate-200 dark:border-slate-700">
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-4">
                            Cambiar Contraseña
                        </h3>
                        
                        <form action="{{ route('profile.update.password') }}" method="POST" class="space-y-4">
                            @csrf

                            <div class="form-group">
                                <label for="current_password" class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                                    Contraseña Actual <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="password"
                                    id="current_password"
                                    name="current_password"
                                    required
                                    placeholder="Ingresa tu contraseña actual"
                                    class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent"
                                />
                            </div>

                            <div class="form-group">
                                <label for="new_password" class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                                    Nueva Contraseña <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="password"
                                    id="new_password"
                                    name="new_password"
                                    required
                                    minlength="8"
                                    placeholder="Mínimo 8 caracteres"
                                    class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent"
                                />
                            </div>

                            <div class="form-group">
                                <label for="new_password_confirmation" class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                                    Confirmar Nueva Contraseña <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="password"
                                    id="new_password_confirmation"
                                    name="new_password_confirmation"
                                    required
                                    minlength="8"
                                    placeholder="Repite la nueva contraseña"
                                    class="w-full px-4 py-2 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D] focus:border-transparent"
                                />
                            </div>

                            <button 
                                type="submit"
                                class="px-6 py-2 bg-[#1B365D] text-white font-bold rounded-lg hover:opacity-90 active:scale-95 transition-all"
                            >
                                Actualizar Contraseña
                            </button>
                        </form>
                    </div>

                    <!-- Notificaciones por correo -->
                    <div>
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-4">
                            Preferencias de Notificaciones
                        </h3>
                        
                        <form action="{{ route('profile.update.notifications') }}" method="POST" class="space-y-4">
                            @csrf

                            <div class="flex items-center gap-3 p-4 bg-slate-50 dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700">
                                <input 
                                    type="checkbox"
                                    id="email_notifications"
                                    name="email_notifications"
                                    checked
                                    class="w-4 h-4 accent-[#1B365D] cursor-pointer"
                                />
                                <label for="email_notifications" class="flex-1 cursor-pointer">
                                    <p class="text-sm font-bold text-slate-900 dark:text-white">Notificaciones por correo</p>
                                    <p class="text-xs text-slate-600 dark:text-slate-400">Recibe actualizaciones sobre tus incidencias</p>
                                </label>
                            </div>

                            <div class="flex items-center gap-3 p-4 bg-slate-50 dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700">
                                <input 
                                    type="checkbox"
                                    id="news_notifications"
                                    name="news_notifications"
                                    class="w-4 h-4 accent-[#1B365D] cursor-pointer"
                                />
                                <label for="news_notifications" class="flex-1 cursor-pointer">
                                    <p class="text-sm font-bold text-slate-900 dark:text-white">Noticias y novedades</p>
                                    <p class="text-xs text-slate-600 dark:text-slate-400">Recibe información sobre nuevas funciones</p>
                                </label>
                            </div>

                            <button 
                                type="submit"
                                class="px-6 py-2 bg-[#1B365D] text-white font-bold rounded-lg hover:opacity-90 active:scale-95 transition-all"
                            >
                                Guardar Preferencias
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Barra lateral -->
            <div class="lg:col-span-1">
                <!-- Actividad reciente -->
                <div class="bg-white dark:bg-slate-900 rounded-lg border border-[#C4C7CF] dark:border-slate-700 p-6 mb-6 sticky top-20">
                    <h3 class="text-lg font-bold text-[#1B365D] dark:text-blue-400 mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined">history</span>
                        Actividad Reciente
                    </h3>
                    
                    <div class="space-y-4">
                        <div class="pb-4 border-b border-slate-200 dark:border-slate-700">
                            <p class="text-sm font-bold text-slate-900 dark:text-white">Perfil actualizado</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Hace 2 horas</p>
                        </div>

                        <div class="pb-4 border-b border-slate-200 dark:border-slate-700">
                            <p class="text-sm font-bold text-slate-900 dark:text-white">Contraseña cambiada</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Hace 5 días</p>
                        </div>

                        <div class="pb-4 border-b border-slate-200 dark:border-slate-700">
                            <p class="text-sm font-bold text-slate-900 dark:text-white">Cuenta creada</p>
                            <p class="text-xs text-slate-500 dark:text-slate-400">1 enero 2024</p>
                        </div>
                    </div>
                </div>

                <!-- Datos de cuenta -->
                <div class="bg-white dark:bg-slate-900 rounded-lg border border-[#C4C7CF] dark:border-slate-700 p-6">
                    <h3 class="text-lg font-bold text-[#1B365D] dark:text-blue-400 mb-4 flex items-center gap-2">
                        <span class="material-symbols-outlined">info</span>
                        Datos de Cuenta
                    </h3>
                    
                    <div class="space-y-3">
                        <div class="text-sm">
                            <p class="font-bold text-slate-900 dark:text-white">ID de Usuario</p>
                            <p class="text-xs text-slate-600 dark:text-slate-400">12345</p>
                        </div>

                        <div class="text-sm">
                            <p class="font-bold text-slate-900 dark:text-white">Estado</p>
                            <p class="text-xs text-green-600 dark:text-green-400 font-bold">Verificado</p>
                        </div>

                        <div class="text-sm">
                            <p class="font-bold text-slate-900 dark:text-white">Miembro desde</p>
                            <p class="text-xs text-slate-600 dark:text-slate-400">1 enero 2024</p>
                        </div>

                        <button class="w-full mt-4 px-4 py-2 bg-red-500 text-white font-bold rounded-lg hover:opacity-90 active:scale-95 transition-all text-sm">
                            Eliminar Cuenta
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
