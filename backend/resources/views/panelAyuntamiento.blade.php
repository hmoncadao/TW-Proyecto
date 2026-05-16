@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<main class="min-h-screen bg-slate-100">

  <div class="max-w-[1280px] mx-auto px-6 sm:px-8 lg:px-12 pt-32 pb-20 space-y-10">

    <!-- Header -->
    <section class="space-y-6">

      <h1 class="text-3xl font-bold text-[#1B365D] px-2">
        Panel del Ayuntamiento
      </h1>

      <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-4">

        <p class="text-slate-600 leading-relaxed">
          Esta plataforma es el centro de control de incidencias urbanas del municipio. 
          Aquí se recogen los avisos enviados por la ciudadanía, junto con su ubicación y el estado en el que se encuentran, todo actualizado en tiempo real.

        <p class="text-slate-600 leading-relaxed">
          El sistema ayuda a los equipos municipales a organizar y priorizar las incidencias para darles 
          una respuesta más rápida y eficiente. También permite hacer un seguimiento claro de cada caso desde que se reporta hasta que se resuelve.
        </p>
        
        <p class="text-slate-600 leading-relaxed">
        Queremos contar contigo: tu participación es clave para mejorar la ciudad. Puedes reportar
          problemas que veas en tu entorno y ayudar a que entre todos hagamos una ciudad más limpia, segura y funcional.
        </p>
        

      <p class="mt-2 inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-100 border border-slate-200 text-slate-600 text-sm font-medium">
          <span class="w-2 h-2 rounded-full bg-[#1B365D]"></span>
          Último mes:
          <span class="font-semibold text-[#1B365D]">
              {{ $incidencias->count() }}
          </span>
          incidencias registradas
      </p>

      </div>

    </section>

    <!-- Mapa y estadísticas -->
    <section class="grid grid-cols-1 lg:grid-cols-4 gap-6">

      <!-- Mapa -->
      <div class="lg:col-span-3 bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-sm">

        <div id="map" class="h-[520px] w-full z-0"></div>

      </div>

      <!-- Estadísticas -->
      <aside class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-6">

        <h2 class="font-bold text-[#1B365D] text-lg">
          Resumen
        </h2>

        <div class="space-y-4 text-sm">

          <div class="flex justify-between">
            <span class="text-slate-500">Total</span>
            <b>{{ $total }}</b>
          </div>

          <div class="flex justify-between">
            <span class="text-slate-500">Resueltas</span>
            <b class="text-green-600">{{ $resueltas }}</b>
          </div>

          <div class="flex justify-between">
            <span class="text-slate-500">Pendientes</span>
            <b class="text-red-600">{{ $pendientes }}</b>
          </div>

          <div class="flex justify-between">
            <span class="text-slate-500">En proceso</span>
            <b class="text-blue-600">{{ $enProceso }}</b>
          </div>

        </div>

        <a href="{{ url('/reportar') }}"
          class="block w-full bg-[#1B365D] hover:bg-[#152849] text-white py-3 rounded-xl text-center font-semibold transition">
          Reportar incidencia
        </a>

      </aside>

    </section>

    <!-- Tabla -->
    <section class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

      <div class="p-5 border-b bg-slate-50 flex items-center gap-2">
        <span class="material-symbols-outlined text-[#1B365D]">list</span>
        <h2 class="font-bold text-[#1B365D]">
          Incidencias del último mes
        </h2>
      </div>

      <table class="w-full text-sm">

        <tbody class="divide-y divide-slate-100">

          @forelse($incidencias as $inc)

          <tr class="hover:bg-slate-50 transition">

            <td class="p-4 font-medium text-slate-700">
              {{ $inc->titulo ?? 'Incidencia' }}
            </td>

            <td class="p-4 font-semibold
              @if($inc->estado == 'Pendiente') text-red-600
              @elseif($inc->estado == 'En Progreso') text-blue-600
              @else text-green-600 @endif">
              {{ $inc->estado }}
            </td>

            <td class="p-4 text-slate-600">
              {{ $inc->ubicacion }}
            </td>

            <td class="p-4 text-right text-slate-400">
              {{ $inc->created_at->diffForHumans() }}
            </td>

          </tr>

          @empty

          <tr>
            <td colspan="4" class="p-6 text-center text-slate-400">
              No hay incidencias este mes
            </td>
          </tr>

          @endforelse

        </tbody>

      </table>

    </section>

  </div>
</main>

<!-- Script JS para el mapa interactivo -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    const map = L.map('map', {
        scrollWheelZoom: true,
        dragging: true
    }).setView([39.9864, -0.0513], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap'
    }).addTo(map);

    const incidencias = @json($incidencias);

    function color(estado) {
        if (estado === 'Pendiente') return 'red';
        if (estado === 'En Progreso') return 'blue';
        return 'green';
    }

    const bounds = [];

    incidencias.forEach(i => {

        if (!i.ubicacion) return;

        // Parser "lat, lng" para que salga el punto en el mapa
        const parts = i.ubicacion.split(',');

        if (parts.length !== 2) return;

        const lat = parseFloat(parts[0].trim());
        const lng = parseFloat(parts[1].trim());

        if (isNaN(lat) || isNaN(lng)) return;

        const marker = L.circleMarker([lat, lng], {
            radius: 8,
            color: color(i.estado),
            fillColor: color(i.estado),
            fillOpacity: 0.9,
            weight: 2
        })
        .addTo(map)
        .bindPopup(`
            <b>${i.titulo ?? 'Incidencia'}</b><br>
            ${i.estado}<br>
            <small>${i.ubicacion}</small>
        `);

        bounds.push([lat, lng]);
    });

    // Ajuste mapa a todos los puntos
    if (bounds.length > 0) {
        map.fitBounds(bounds, { padding: [30, 30] });
    }

    setTimeout(() => {
        map.invalidateSize();
    }, 200);

});
</script>

@endsection