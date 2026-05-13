@extends('layouts.app')
@section('content')
<div class="min-h-screen bg-gray-50 md:ml-64 lg:mr-64 pt-20">
    <section class="bg-gradient-to-r from-[#1B365D] to-[#2C5282] py-20 px-6">
        <div class="max-w-7xl mx-auto text-center text-white">
            <h1 class="text-5xl md:text-6xl font-bold mb-6">
                Contacto
            </h1>
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
            <div class="bg-white rounded-3xl shadow-lg p-10 border border-gray-200">
                <h2 class="text-3xl font-bold text-[#1B365D] mb-8">
                    Información del Proyecto
                </h2>
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
                        <p class="text-lg font-semibold">tw@ugr.es</p>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-3xl shadow-lg p-10 border border-gray-200">
                <h2 class="text-3xl font-bold text-[#1B365D] mb-8">
                    Enviar mensaje
                </h2>
                <form action="#" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Nombre completo</label>
                        <input type="text" name="nombre" required
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#1B365D]"
                            placeholder="Introduce tu nombre">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Correo electrónico</label>
                        <input type="email" name="email" required
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#1B365D]"
                            placeholder="correo@ejemplo.com">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Mensaje</label>
                        <textarea name="mensaje" rows="6" required
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#1B365D]"
                            placeholder="Escribe aquí tu mensaje..."></textarea>
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