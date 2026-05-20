@extends('layouts.app')
@section('content')

<div class="min-h-screen bg-gray-50 pt-16 md:pt-20">

    <!-- HERO -->
    <section class="bg-gradient-to-r from-[#1B365D] to-[#2C5282] py-14 sm:py-16 md:py-20 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto text-center text-white">

            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4 md:mb-6">
                Contacto
            </h1>

            <p class="text-sm sm:text-base md:text-xl text-gray-200 max-w-3xl mx-auto">
                ¿Quieres saber más sobre los desarrolladores que han creado la página web gestión de incidencias del ayuntamiento?
            </p>

            <p class="text-sm sm:text-base md:text-xl text-gray-200 max-w-3xl mx-auto mt-2">
                Te mostramos todos los detalles que necesites
            </p>

        </div>
    </section>

    <!-- CONTENIDO -->
    <section class="py-10 md:py-16 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-10">

            <!-- INFORMACIÓN -->
            <div class="bg-white rounded-2xl md:rounded-3xl shadow-lg p-6 md:p-10 border border-gray-200">

                <h2 class="text-2xl md:text-3xl font-bold text-[#1B365D] mb-6 md:mb-8">
                    Información del Proyecto
                </h2>

                <div class="space-y-4 md:space-y-6 text-gray-700">

                    <div>
                        <p class="text-xs md:text-sm text-gray-500 mb-1">Proyecto</p>
                        <p class="text-base md:text-lg font-semibold">Gestión de Incidencias Urbanas</p>
                    </div>

                    <div>
                        <p class="text-xs md:text-sm text-gray-500 mb-1">Asignatura</p>
                        <p class="text-base md:text-lg font-semibold">Tecnologías Web</p>
                    </div>

                    <div>
                        <p class="text-xs md:text-sm text-gray-500 mb-1">Equipo de desarrollo</p>
                        <p class="text-sm md:text-lg font-semibold text-blue-600">
                            Alfredo Iniesta García, Javier Maestre Cerdeño, Carlos Mayorga Santiago, Helena Moncada Ocaña
                        </p>
                    </div>

                    <div>
                        <p class="text-xs md:text-sm text-gray-500 mb-1">Correo de contacto</p>
                        <a href="mailto:ayuntamiento@govconnect.es"
                           class="text-sm md:text-lg font-semibold text-[#1B365D] hover:underline flex items-center gap-2">
                            <span class="material-symbols-outlined text-base">mail</span>
                            ayuntamiento@govconnect.es
                        </a>
                    </div>

                    <div>
                        <p class="text-xs md:text-sm text-gray-500 mb-1">Teléfono</p>
                        <a href="tel:+34958000000"
                           class="text-sm md:text-lg font-semibold text-[#1B365D] hover:underline flex items-center gap-2">
                            <span class="material-symbols-outlined text-base">call</span>
                            +34 958 000 000
                        </a>
                    </div>

                </div>
            </div>

            <!-- FORMULARIO -->
            <div class="bg-white rounded-2xl md:rounded-3xl shadow-lg p-6 md:p-10 border border-gray-200">

                <h2 class="text-2xl md:text-3xl font-bold text-[#1B365D] mb-6 md:mb-8">
                    Enviar mensaje
                </h2>

                @if(session('success'))
                    <div class="bg-green-50 border border-green-300 text-green-800 rounded-xl px-4 py-3 mb-6 flex items-center gap-3 text-sm">
                        <span class="material-symbols-outlined">check_circle</span>
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contacto.store') }}" method="POST" class="space-y-5 md:space-y-6">
                    @csrf

                    <div>
                        <label class="block text-gray-700 font-medium mb-2 text-sm md:text-base">Nombre completo <span class="text-red-500">*</span></label></label>
                        <input type="text" name="nombre" required
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 text-sm md:text-base focus:ring-2 focus:ring-[#1B365D]">

                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2 text-sm md:text-base">Correo electrónico <span class="text-red-500">*</span></label></label>
                        <input type="email" name="email" required
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 text-sm md:text-base focus:ring-2 focus:ring-[#1B365D]">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2 text-sm md:text-base">Mensaje<span class="text-red-500">*</span></label></label>
                        <textarea name="mensaje" rows="5" required
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 text-sm md:text-base focus:ring-2 focus:ring-[#1B365D]"></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-[#1B365D] hover:bg-[#152b4a] text-white font-semibold py-3 md:py-4 rounded-xl transition">
                        Enviar mensaje
                    </button>

                </form>
            </div>

        </div>
    </section>

</div>

@endsection