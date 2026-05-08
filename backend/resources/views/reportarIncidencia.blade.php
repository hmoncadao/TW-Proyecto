@extends('layouts.app')

@section('content')

<!--
    pt-32:
    Baja TODO el contenido para que:
    - no choque con navbar
    - no choque con botón hamburguesa
    - no necesites md:ml-64
-->

<div class="pt-32 pb-32 min-h-screen">

    <div class="max-w-[1280px] mx-auto px-4 md:px-6">
        
        <!-- Encabezado -->
        <div class="mb-8">

            <h1 class="text-3xl font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                Reportar Incidencia
            </h1>

            <p class="text-slate-600 dark:text-slate-400">
                Ayúdenos a mejorar nuestra ciudad. Su reporte será canalizado directamente al departamento correspondiente.
            </p>

        </div>

        <!-- GRID -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- SIDEBAR INFO -->
            <div class="lg:col-span-1 space-y-6">
                
                <!-- TARJETA AZUL -->
                <div class="bg-[#1B365D] rounded-lg border border-[#1B365D] p-8 text-white shadow-sm">
                    
                    <h2 class="text-xl font-bold mb-4">
                        Reporte Ciudadano
                    </h2>

                    <p class="text-sm text-blue-100 mb-6">
                        Su reporte será canalizado directamente al departamento correspondiente para su pronta resolución.
                    </p>
                    
                    <div class="space-y-5">

                        <div class="flex gap-3">

                            <span class="material-symbols-outlined text-blue-300">
                                check_circle
                            </span>

                            <div>
                                <p class="font-bold text-sm">
                                    Precisión
                                </p>

                                <p class="text-xs text-blue-100 mt-1">
                                    Proporcione detalles específicos y una ubicación exacta.
                                </p>
                            </div>

                        </div>

                        <div class="flex gap-3">

                            <span class="material-symbols-outlined text-blue-300">
                                photo_camera
                            </span>

                            <div>
                                <p class="font-bold text-sm">
                                    Evidencia
                                </p>

                                <p class="text-xs text-blue-100 mt-1">
                                    Una fotografía ayuda significativamente a evaluar la prioridad.
                                </p>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- SOPORTE -->
                <div class="bg-white dark:bg-slate-900 rounded-lg border border-[#C4C7CF] dark:border-slate-700 p-8 shadow-sm">

                    <h3 class="text-lg font-bold text-[#1B365D] dark:text-blue-400 mb-2">
                        Canal de Soporte
                    </h3>

                    <p class="text-sm text-slate-600 dark:text-slate-400 mb-4">
                        Si tiene problemas con el formulario, contacte al soporte técnico.
                    </p>

                    <div class="flex items-center gap-2">

                        <span class="material-symbols-outlined text-slate-400">
                            mail
                        </span>

                        <a
                            href="mailto:soporte@govconnect.mx"
                            class="text-sm font-bold text-slate-900 dark:text-white hover:underline"
                        >
                            soporte@govconnect.mx
                        </a>

                    </div>

                </div>
            </div>

            <!-- FORMULARIO -->
            <div class="lg:col-span-2">

                <div class="bg-white dark:bg-slate-900 rounded-lg border border-[#C4C7CF] dark:border-slate-700 p-6 md:p-8 shadow-sm">
                    
                    <h2 class="text-2xl font-bold text-[#1B365D] dark:text-blue-400 mb-6 flex items-center gap-2">

                        <span class="material-symbols-outlined">
                            edit_document
                        </span>

                        Detalles de la Incidencia

                    </h2>

                    <!-- FORM -->
                    <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">

                        @csrf

                        <!-- TITULO + CATEGORIA -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>

                                <label
                                    for="titulo"
                                    class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2"
                                >
                                    Título de la incidencia
                                    <span class="text-red-500">*</span>
                                </label>

                                <input
                                    type="text"
                                    id="titulo"
                                    name="titulo"
                                    required
                                    placeholder="Ej. Bache profundo en calle principal"
                                    class="w-full px-4 py-3 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D]"
                                />

                            </div>

                            <div>

                                <label
                                    for="categoria"
                                    class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2"
                                >
                                    Categoría
                                    <span class="text-red-500">*</span>
                                </label>

                                <select
                                    id="categoria"
                                    name="categoria"
                                    required
                                    class="w-full px-4 py-3 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D]"
                                >
                                    <option value="" disabled selected>
                                        Seleccione una categoría
                                    </option>

                                    <option value="infraestructura">
                                        Infraestructura y Vías
                                    </option>

                                    <option value="limpieza">
                                        Limpieza y Residuos
                                    </option>

                                    <option value="iluminacion">
                                        Iluminación Pública
                                    </option>

                                    <option value="seguridad">
                                        Seguridad y Orden
                                    </option>
                                </select>

                            </div>

                        </div>

                        <!-- DESCRIPCION -->
                        <div>

                            <label
                                for="descripcion"
                                class="block text-sm font-bold text-[#1B365D] dark:text-blue-400 mb-2"
                            >
                                Descripción
                                <span class="text-red-500">*</span>
                            </label>

                            <textarea
                                id="descripcion"
                                name="descripcion"
                                rows="5"
                                required
                                placeholder="Describa los detalles del incidente..."
                                class="w-full px-4 py-3 border border-slate-300 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1B365D]"
                            ></textarea>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection