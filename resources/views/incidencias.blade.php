@extends('layouts.app')

@section('content')

<main class="min-h-screen pt-[140px] md:pt-24 pb-12 px-6 bg-slate-50">

<div class="w-full max-w-[1280px] mx-auto flex flex-col gap-8">

    <!-- Título -->
    <div>
        <h1 class="text-3xl font-bold text-[#1B365D]">Monitor de Incidencias</h1>
        <p class="text-slate-600 mt-2">
            Consulta las incidencias registradas en nuestra ciudad y sus detalles.
        </p>
    </div>

    <!-- Formulario de incidencia -->
    <form method="GET" action="{{ url('/incidencias') }}" 
        class="bg-white border border-slate-200 p-6 rounded-lg shadow-sm">

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            <!-- Buscador -->
            <div class="md:col-span-2 flex flex-col gap-2">
                <label for="search" class="text-sm font-semibold text-slate-600">Búsqueda</label>

                <input id="search" type="text" name="search"
                    value="{{ request('search') }}"
                    placeholder="Buscar por ID o descripción..."
                    class="w-full px-3 py-3 border rounded-lg focus:ring-2 focus:ring-[#1B365D]">
            </div>

            <!-- Estado -->
            <div class="flex flex-col gap-2">
                <label for="estado" class="text-sm font-semibold text-slate-600">Estado</label>

                <select name="estado"
                    class="w-full px-3 py-3 border rounded-lg focus:ring-2 focus:ring-[#1B365D]">
                    <option value="">Todos</option>
                    <option value="Pendiente">Pendiente</option>
                    <option value="En Progreso">En Progreso</option>
                    <option value="Resuelta">Resuelta</option>
                </select>
            </div>

            <!-- Categoría -->
            <div class="flex flex-col gap-2">
                <label for="categoria" class="text-sm font-semibold text-slate-600">Categoría</label>

                <select name="categoria"
                    class="w-full px-3 py-3 border rounded-lg focus:ring-2 focus:ring-[#1B365D]">
                    <option value="">Todas</option>
                    <option value="infraestructura">Infraestructura</option>
                    <option value="sanidad">Sanidad</option>
                    <option value="seguridad">Seguridad</option>
                </select>
            </div>

            <!-- Mes + Año -->
            <div class="md:col-span-2 grid grid-cols-2 gap-2">
                
                <select id="mes" name="mes"
                    class="w-full px-3 py-3 border rounded-lg focus:ring-2 focus:ring-[#1B365D]">
                    <option value="">Mes</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

                <select id="año" name="anio"
                    class="w-full px-3 py-3 border rounded-lg focus:ring-2 focus:ring-[#1B365D]">
                    <option value="">Año</option>
                    @for ($i = date('Y'); $i >= 2020; $i--)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>

            </div>

            <!-- Botones -->
            <div class="flex items-end md:col-start-3 gap-3">

                <!-- Filtrar -->
                <button type="submit"
                    class="w-full bg-[#1B365D] text-white py-3 rounded-lg hover:bg-[#152849] transition">
                    Filtrar
                </button>

                <!-- Limpiar -->
                <a href="{{ url('/incidencias') }}"
                    class="w-full text-center bg-slate-200 text-slate-700 py-3 rounded-lg hover:bg-slate-300 transition">
                    Limpiar
                </a>

            </div>

        </div>
    </form>

    <!-- Tabla -->
    <section class="bg-white border border-slate-200 rounded-lg shadow-sm">

        <div class="overflow-x-auto w-full">

            <table class="w-full min-w-[900px] text-left">

                <thead class="bg-slate-100">
                    <tr>
                        <th scope="col" class="px-6 py-4 whitespace-nowrap">ID</th>
                        <th scope="col" class="px-6 py-4 whitespace-nowrap">Categoría</th>
                        <th scope="col" class="px-6 py-4 whitespace-nowrap">Título</th>
                        <th scope="col" class="px-6 py-4 whitespace-nowrap">Estado</th>
                        <th scope="col" class="px-6 py-4 whitespace-nowrap">Fecha</th>
                        <th scope="col" class="px-6 py-4 text-center whitespace-nowrap">Detalle</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-200">

                @forelse($incidencias as $incidencia)

                    <tr class="hover:bg-slate-50">
                        <td class="px-6 py-4 font-semibold whitespace-nowrap">#{{ $incidencia->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $incidencia->categoria }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $incidencia->titulo }}</td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($incidencia->estado === 'Pendiente')
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">
                                    Pendiente
                                </span>
                            @elseif($incidencia->estado === 'En Progreso')
                            <span class="sr-only" class="inline-block bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm whitespace-nowrap">
                                En Progreso
                            </span>
                            @else
                                <span class="sr-only" class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                    Resuelta
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $incidencia->created_at }}
                        </td>

                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            <a aria-label="Ver detalle de incidencia {{ $incidencia->id }}" href="{{ url('/incidencias/' . $incidencia->id) }}" 
                            class="text-[#1B365D] font-semibold hover:underline">
                                Ver detalle
                            </a>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="6" role="status" aria-live="polite" class="text-center py-6 text-slate-500">
                            No hay incidencias
                        </td>
                    </tr>
                @endforelse

                </tbody>

            </table>

        </div>

    </section>

</div>

</main>

@endsection