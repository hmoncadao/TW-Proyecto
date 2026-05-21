@extends('layouts.app')
@section('content')

<main class="min-h-screen pt-[140px] md:pt-24 pb-12 px-6 bg-slate-50">
<div class="w-full max-w-[1280px] mx-auto flex flex-col gap-8">
    <!-- CABECERA -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <span class="material-symbols-outlined text-[#1B365D] text-3xl">admin_panel_settings</span>
                <h1 class="text-3xl font-bold text-[#1B365D]">Panel de Administración</h1>
            </div>
            <p class="text-slate-500">Gestiona las incidencias: cambia su estado o elimínalas.</p>
        </div>
        <div class="bg-amber-100 border border-amber-300 text-amber-800 text-sm font-semibold px-4 py-2 rounded-full flex items-center gap-2">
            <span class="material-symbols-outlined text-base">verified_user</span>
            Sesión de administrador
        </div>
    </div>
    <!-- ALERTAS -->
    @if(session('success'))
        <div class="bg-green-50 border border-green-300 text-green-800 rounded-lg px-5 py-4 flex items-center gap-3">
            <span class="material-symbols-outlined">check_circle</span>
            {{ session('success') }}
        </div>
    @endif
    <!-- FILTROS -->
    <form method="GET" action="{{ route('admin.incidencias') }}"
          class="bg-white border border-slate-200 p-6 rounded-lg shadow-sm">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="flex flex-col gap-2">
                <label class="text-sm font-semibold text-slate-600">Búsqueda</label>
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="ID, título o descripción…"
                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-[#1B365D]">
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-sm font-semibold text-slate-600">Estado</label>
                <select name="estado" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-[#1B365D]">
                    <option value="">Todos</option>
                    <option value="Pendiente"   {{ request('estado') == 'Pendiente'   ? 'selected' : '' }}>Pendiente</option>
                    <option value="En Progreso" {{ request('estado') == 'En Progreso' ? 'selected' : '' }}>En Progreso</option>
                    <option value="Resuelta"    {{ request('estado') == 'Resuelta'    ? 'selected' : '' }}>Resuelta</option>
                </select>
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-sm font-semibold text-slate-600">Categoría</label>
                <select name="categoria" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-[#1B365D]">
                    <option value="">Todas</option>
                    <option value="infraestructura" {{ request('categoria') == 'infraestructura' ? 'selected' : '' }}>Infraestructura</option>
                    <option value="sanidad"         {{ request('categoria') == 'sanidad'         ? 'selected' : '' }}>Sanidad</option>
                    <option value="seguridad"       {{ request('categoria') == 'seguridad'       ? 'selected' : '' }}>Seguridad</option>
                </select>
            </div>
        </div>
        <div class="mt-4 flex gap-3">
            <button type="submit"
                class="px-5 py-2 bg-[#1B365D] text-white font-semibold rounded-lg hover:opacity-90 transition flex items-center gap-2">
                <span class="material-symbols-outlined text-base">search</span> Filtrar
            </button>
            <a href="{{ route('admin.incidencias') }}"
               class="px-5 py-2 bg-slate-200 text-slate-700 font-semibold rounded-lg hover:bg-slate-300 transition flex items-center gap-2">
                <span class="material-symbols-outlined text-base">refresh</span> Limpiar
            </a>
        </div>
    </form>
    <!-- TABLA -->
    <div class="bg-white border border-slate-200 rounded-lg shadow-sm overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-[#1B365D] text-white">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold">#</th>
                    <th class="px-4 py-3 text-left font-semibold">Título</th>
                    <th class="px-4 py-3 text-left font-semibold">Categoría</th>
                    <th class="px-4 py-3 text-left font-semibold">Ubicación</th>
                    <th class="px-4 py-3 text-left font-semibold">Fecha</th>
                    <th class="px-4 py-3 text-left font-semibold">Estado</th>
                    <th class="px-4 py-3 text-center font-semibold">Cambiar Estado</th>
                    <th class="px-4 py-3 text-center font-semibold">Eliminar</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($incidencias as $inc)
                <tr class="hover:bg-slate-50 transition">
                    <td class="px-4 py-3 font-mono text-slate-500">#{{ $inc->id }}</td>
                    <td class="px-4 py-3">
                        <a href="{{ route('detalle', $inc->id) }}"
                           class="font-semibold text-[#1B365D] hover:underline">
                            {{ $inc->titulo }}
                        </a>
                        <p class="text-xs text-slate-400 truncate max-w-[180px]">{{ $inc->descripcion }}</p>
                    </td>
                    <td class="px-4 py-3 capitalize text-slate-600">{{ $inc->categoria }}</td>
                    <td class="px-4 py-3 text-slate-600 max-w-[140px] truncate">{{ $inc->ubicacion }}</td>
                    <td class="px-4 py-3 text-slate-500 whitespace-nowrap">
                        {{ $inc->created_at->format('d/m/Y') }}
                    </td>
                    <td class="px-4 py-3">
                        @if($inc->estado === 'Pendiente')
                            <span class="px-2 py-1 rounded-full text-xs font-bold bg-red-100 text-yellow-700">Pendiente</span>
                        @elseif($inc->estado === 'En Progreso')
                            <span class="px-2 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-700">En Progreso</span>
                        @else
                            <span class="px-2 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">Resuelta</span>
                        @endif
                    </td>
                    <!-- CAMBIAR ESTADO -->
                    <td class="px-4 py-3 text-center">
                        <form action="{{ route('admin.incidencias.estado', $inc->id) }}" method="POST"
                              class="flex items-center gap-2 justify-center">
                            @csrf
                            <select name="estado"
                                class="text-xs px-2 py-1 border border-slate-300 rounded-lg focus:ring-2 focus:ring-[#1B365D]">
                                <option value="Pendiente"   {{ $inc->estado == 'Pendiente'   ? 'selected' : '' }}>Pendiente</option>
                                <option value="En Progreso" {{ $inc->estado == 'En Progreso' ? 'selected' : '' }}>En Progreso</option>
                                <option value="Resuelta"    {{ $inc->estado == 'Resuelta'    ? 'selected' : '' }}>Resuelta</option>
                            </select>
                            <button type="submit"
                                class="px-3 py-1 bg-[#1B365D] text-white text-xs font-bold rounded-lg hover:opacity-90 transition">
                                <span class="material-symbols-outlined text-sm">save</span>
                            </button>
                        </form>
                    </td>

                    <!-- ELIMINAR -->
                    <td class="px-4 py-3 text-center">
                        <form action="{{ route('admin.incidencias.destroy', $inc->id) }}" method="POST"
                              onsubmit="return confirm('¿Seguro que quieres eliminar la incidencia #{{ $inc->id }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-3 py-1 bg-red-600 text-white text-xs font-bold rounded-lg hover:bg-red-700 transition mx-auto flex items-center">
                                <span class="material-symbols-outlined text-sm">delete</span>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-6 py-12 text-center text-slate-400">
                        <span class="material-symbols-outlined text-4xl block mb-2">inbox</span>
                        No se encontraron incidencias.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        @if($incidencias->hasPages())
        <div class="px-6 py-4 border-t border-slate-100">
            {{ $incidencias->withQueryString()->links() }}
        </div>
        @endif
    </div>
    <p class="text-sm text-slate-500 -mt-4">
        Mostrando {{ $incidencias->count() }} de {{ $incidencias->total() }} incidencias
    </p>
    <!-- MENSAJES DE CONTACTO -->
    <div class="flex items-center gap-2 mt-4">
        <span class="material-symbols-outlined text-[#1B365D] text-2xl">forum</span>
        <h2 class="text-2xl font-bold text-[#1B365D]">Mensajes de Contacto</h2>
    </div>
    <div class="bg-white border border-slate-200 rounded-lg shadow-sm overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-[#1B365D] text-white">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold">#</th>
                    <th class="px-4 py-3 text-left font-semibold">Nombre</th>
                    <th class="px-4 py-3 text-left font-semibold">Email</th>
                    <th class="px-4 py-3 text-left font-semibold">Mensaje</th>
                    <th class="px-4 py-3 text-left font-semibold">Fecha</th>
                    <th class="px-4 py-3 text-center font-semibold">Eliminar</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($mensajes as $msg)
                <tr class="hover:bg-slate-50 transition">
                    <td class="px-4 py-3 font-mono text-slate-400 text-xs">#{{ $msg->id }}</td>
                    <td class="px-4 py-3 font-semibold text-slate-800">{{ $msg->nombre }}</td>
                    <td class="px-4 py-3">
                        <a href="mailto:{{ $msg->email }}" class="text-[#1B365D] hover:underline">
                            {{ $msg->email }}
                        </a>
                    </td>
                    <td class="px-4 py-3 text-slate-600 max-w-xs">
                        <p class="truncate">{{ $msg->mensaje }}</p>
                    </td>
                    <td class="px-4 py-3 text-slate-500 whitespace-nowrap">
                        {{ $msg->created_at->format('d/m/Y H:i') }}
                    </td>
                    <td class="px-4 py-3 text-center">
                        <form action="{{ route('admin.mensajes.destroy', $msg->id) }}" method="POST"
                              onsubmit="return confirm('¿Seguro que quieres eliminar este mensaje?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-3 py-1 bg-red-600 text-white text-xs font-bold rounded-lg hover:bg-red-700 transition mx-auto flex items-center">
                                <span class="material-symbols-outlined text-sm">delete</span>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-12 text-center text-slate-400">
                        <span class="material-symbols-outlined text-4xl block mb-2">forum</span>
                        No hay mensajes todavía.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</main>

@endsection