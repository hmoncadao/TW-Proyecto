@extends('layouts.app')

@section('content')

<main class="max-w-6xl mx-auto px-6 py-10 pt-24 space-y-8">

  <!-- TITLE -->
  <div>
    <h1 class="text-3xl md:text-4xl font-bold text-[#1B365D]">
      Detalle de Incidencia #{{ $incidencia->id }}
    </h1>

    <p class="text-slate-500 mt-1">
      {{ $incidencia->ubicacion }}
    </p>
  </div>

  <!-- GRID -->
  <div class="grid lg:grid-cols-12 gap-6">

    <!-- LEFT -->
    <div class="lg:col-span-8 space-y-6">

      <!-- IMAGE -->
      <div class="rounded-xl overflow-hidden border bg-white">

        @if($incidencia->fotografia)

          <img
            class="w-full h-[360px] object-cover"
            src="{{ asset('storage/' . $incidencia->fotografia) }}"
            alt="Imagen incidencia"
          >

        @else

          <div class="w-full h-[360px] flex flex-col items-center justify-center bg-slate-100 text-slate-400">

            <span class="material-symbols-outlined text-6xl mb-3">
              image
            </span>

            <p class="text-lg font-semibold">
              Sin imagen disponible
            </p>

            <p class="text-sm text-slate-400 mt-1">
              Esta incidencia no tiene fotografía adjunta
            </p>

          </div>

        @endif

      </div>

      <!-- DESCRIPTION -->
      <div class="bg-white border rounded-xl p-6">

        <h2 class="text-xl font-bold text-[#1B365D] mb-3">
          {{ $incidencia->titulo }}
        </h2>

        <p class="text-slate-600 leading-relaxed">
          {{ $incidencia->descripcion }}
        </p>

        <div class="flex gap-3 mt-5 flex-wrap">

          <span class="px-3 py-1 bg-gray-100 rounded-full text-sm">
            {{ $incidencia->categoria }}
          </span>

          @if($incidencia->estado === 'Pendiente')

            <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm font-semibold">
              Pendiente
            </span>

          @elseif($incidencia->estado === 'En Progreso')

            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold">
              En Progreso
            </span>

          @else

            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-semibold">
              Resuelta
            </span>

          @endif

        </div>

      </div>

      <!-- UBICACION -->
      <div class="bg-white border rounded-xl overflow-hidden">

        <div class="p-4 border-b flex items-center gap-2 text-[#1B365D] font-semibold">
          <span class="material-symbols-outlined">location_on</span>
          Ubicación
        </div>

        <div class="p-6 text-slate-600">
          {{ $incidencia->ubicacion }}
        </div>

      </div>

    </div>

    <!-- RIGHT -->
    <div class="lg:col-span-4 space-y-6">

      <!-- ESTADO VISUAL -->
      <div class="bg-white border rounded-xl p-5">

        <h2 class="font-bold text-[#1B365D] mb-4">
          Estado
        </h2>

        <div class="space-y-4 text-sm">

          <!-- PENDIENTE -->
          <div class="flex items-center gap-3">
            <span class="w-3 h-3 rounded-full {{ $incidencia->estado == 'Pendiente' ? 'bg-red-500' : 'bg-gray-300' }}"></span>
            <span class="{{ $incidencia->estado == 'Pendiente' ? 'text-red-700 font-semibold' : '' }}">
              Pendiente
            </span>
          </div>

          <!-- EN PROGRESO -->
          <div class="flex items-center gap-3">
            <span class="w-3 h-3 rounded-full {{ $incidencia->estado == 'En Progreso' ? 'bg-blue-500' : 'bg-gray-300' }}"></span>
            <span class="{{ $incidencia->estado == 'En Progreso' ? 'text-blue-700 font-semibold' : '' }}">
              En proceso
            </span>
          </div>

          <!-- RESUELTA -->
          <div class="flex items-center gap-3">
            <span class="w-3 h-3 rounded-full {{ $incidencia->estado == 'Resuelta' ? 'bg-green-500' : 'bg-gray-300' }}"></span>
            <span class="{{ $incidencia->estado == 'Resuelta' ? 'text-green-700 font-semibold' : '' }}">
              Finalizado
            </span>
          </div>

        </div>

      </div>

      <!-- INFO BOX -->
      <div class="bg-white border rounded-xl p-5">

        <h2 class="font-bold text-[#1B365D] mb-3">
          Información
        </h2>

        <div class="space-y-3 text-sm text-slate-600">

          <p><strong>ID:</strong> #{{ $incidencia->id }}</p>
          <p><strong>Categoría:</strong> {{ $incidencia->categoria }}</p>
          <p><strong>Estado:</strong> {{ $incidencia->estado }}</p>
          <p><strong>Fecha:</strong> {{ $incidencia->created_at->format('d/m/Y') }}</p>

        </div>

      </div>

      <!-- VOLVER -->
      <a href="{{ url('/incidencias') }}"
        class="block w-full text-center bg-[#1B365D] text-white py-3 rounded-lg font-semibold hover:opacity-90 transition">

        Volver al listado

      </a>

    </div>

  </div>

</main>

@endsection