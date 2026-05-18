@extends('layouts.app')
@section('content')
<div class="min-h-screen bg-gray-50 md:ml-64 lg:mr-64 pt-20">
    <section class="bg-gradient-to-r from-[#1B365D] to-[#2C5282] py-20 px-6">
        <div class="max-w-7xl mx-auto text-center text-white">
            <h1 class="text-5xl md:text-6xl font-bold mb-6">Contacto</h1>
            <p class="text-xl text-gray-200 max-w-3xl mx-auto">
                ¿Quieres saber más sobre los desarrolladores que han creado la página web gestión de incidencias del ayuntamiento?
            </p>
            <p class="text-xl text-gray-200 max-w-3xl mx-auto">
                Te mostramos todos los detalles que necesites
            </p>
        </div>
    </section>

    <section class="py-16 px-6">
        <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-10">

            <!-- INFORMACIÓN -->
            <div class="bg-white rounded-3xl shadow-lg p-10 border border-gray-200">
                <h2 class="text-3xl font-bold text-[#1B365D] mb-8">Información del Proyecto</h2>
                <div class="space-y-6 text-gray-700">
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Proyecto</p>
                        <p class="text-lg font-semibold">Gestión de Incidencias Urbanas</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Asignatura</p>
                        <p class="text-lg font-semibold">Tecnologías Web</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Equipo de desarrollo</p>
                        <p class="text-lg font-semibold text-blue-600">
                            Alfredo Iniesta García, Javier Maestre Cerdeño, Carlos Mayorga Santiago, Helena Moncada Ocaña
                        </p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Correo de contacto</p>
                        <a href="mailto:Ayuntamiento@gmail.es"
                           class="text-lg font-semibold text-[#1B365D] hover:underline flex items-center gap-2">
                            <span class="material-symbols-outlined text-base">mail</span>
                            Ayuntamiento@gmail.es
                        </a>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Teléfono</p>
                        <a href="tel:+34958000000"
                           class="text-lg font-semibold text-[#1B365D] hover:underline flex items-center gap-2">
                            <span class="material-symbols-outlined text-base">call</span>
                            +34 958 000 000
                        </a>
                    </div>
                </div>
            </div>

            <!-- FORMULARIO -->
            <div class="bg-white rounded-3xl shadow-lg p-10 border border-gray-200">
                <h2 class="text-3xl font-bold text-[#1B365D] mb-8">Enviar mensaje</h2>

                @if(session('success'))
                    <div class="bg-green-50 border border-green-300 text-green-800 rounded-xl px-5 py-4 mb-6 flex items-center gap-3">
                        <span class="material-symbols-outlined">check_circle</span>
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contacto.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Nombre completo</label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}" required
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#1B365D] @error('nombre') border-red-400 @enderror"
                            placeholder="Introduce tu nombre">
                        @error('nombre')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Correo electrónico</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#1B365D] @error('email') border-red-400 @enderror"
                            placeholder="correo@ejemplo.com">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Mensaje</label>
                        <textarea name="mensaje" rows="6" required
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#1B365D] @error('mensaje') border-red-400 @enderror"
                            placeholder="Escribe aquí tu mensaje...">{{ old('mensaje') }}</textarea>
                        @error('mensaje')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full bg-[#1B365D] hover:bg-[#152b4a] text-white font-semibold py-4 rounded-xl transition duration-300">
                        Enviar mensaje
                    </button>
                </form>
            </div>

        </div>
    </section>
</div>
@endsection