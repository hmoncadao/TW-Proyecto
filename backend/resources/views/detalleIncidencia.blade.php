@extends('layouts.app')

@section('content')

<body class="bg-gray-50 text-slate-800">

<main class="max-w-6xl mx-auto px-6 py-10 pt-24 space-y-8">

  <!-- TITLE -->
  <div>
    <h1 class="text-3xl md:text-4xl font-bold text-[#1B365D]">
      Detalle de Incidencia #INC-2024-089
    </h1>
    <p class="text-slate-500 mt-1">
      Calle de la Constitución, 42
    </p>
  </div>

  <!-- GRID -->
  <div class="grid lg:grid-cols-12 gap-6">

    <!-- LEFT -->
    <div class="lg:col-span-8 space-y-6">

      <!-- IMAGE -->
      <div class="rounded-xl overflow-hidden border bg-white">
        <img class="w-full h-[360px] object-cover"
          src="https://lh3.googleusercontent.com/aida-public/AB6AXuAPnkkyRTT7YlG2FmAxxL0T32UY5I1bzojPAng3_T49wnmY-1MPqDDVLQQt9P53dpiXoz46E1ZhKBjGBI35FccjykTob6nVwfzu1CY2Q0dgUbENuPJR8KYroOUVU1lV1TepKHK7NUz0EJDv0Ddafh8h-hwvgAjJgNd-6dmKhQcU5D-_KPUVo9ZX0nXECA5_269I2LcZ5vLOHR6MEMjHqFZC9kTeqkO1EJDj44grMsbDNhBX_kkZLcmVgh7k8DlqY5apHExWZzBjaw"/>
      </div>

      <!-- DESCRIPTION -->
      <div class="bg-white border rounded-xl p-6">
        <h2 class="text-xl font-bold text-[#1B365D] mb-3">Descripción</h2>
        <p class="text-slate-600 leading-relaxed">
          Se ha detectado un socavón de aproximadamente 40cm de profundidad en el carril derecho.
          Supone un riesgo para vehículos y peatones. Se requiere intervención urgente.
        </p>

        <div class="flex gap-3 mt-5 flex-wrap">
          <span class="px-3 py-1 bg-gray-100 rounded-full text-sm">Vía pública</span>
          <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm font-semibold">
            Prioridad alta
          </span>
        </div>
      </div>

      <!-- MAP -->
      <div class="bg-white border rounded-xl overflow-hidden">
        <div class="p-4 border-b flex items-center gap-2 text-[#1B365D] font-semibold">
          <span class="material-symbols-outlined">location_on</span>
          Ubicación
        </div>
        <img class="w-full h-[240px] object-cover"
          src="https://lh3.googleusercontent.com/aida-public/AB6AXuBaO5qksDAPbVzH_xM4eIBOrGz6anS5X3t9mAvvnhLp7gt3Jrj7ngikOMagiwuM4UM6F4JViwiRkXn3mMlM9x-6oCJemQ1gsi80KTAwV614d_bVRuLQGy34E79v6SX6ky9fBCqa7hQEDzWmiFSFmOIrxWtF6vgSEps-Iy3MXt9wWICdt_OJfkA59XlouTH7t62WZHfPKq9OotHcuuPjdaNLC6woG8mkzz_0r73xnC7i7xc1Pe2i4D1NAcHgiakuQQy6J5kmKLdC8g"/>
      </div>

    </div>

    <!-- RIGHT -->
    <div class="lg:col-span-4 space-y-6">

      <!-- STATUS -->
      <div class="bg-white border rounded-xl p-5">
        <h2 class="font-bold text-[#1B365D] mb-4">Estado</h2>

        <div class="space-y-4 text-sm">

          <div class="flex items-center gap-3">
            <span class="w-3 h-3 rounded-full bg-green-500"></span>
            <span>Reportado</span>
          </div>

          <div class="flex items-center gap-3">
            <span class="w-3 h-3 rounded-full bg-amber-500"></span>
            <span>En proceso</span>
          </div>

          <div class="flex items-center gap-3 opacity-50">
            <span class="w-3 h-3 rounded-full bg-gray-300"></span>
            <span>Finalizado</span>
          </div>

        </div>
      </div>

      <!-- INFO BOX -->
      <div class="bg-white border rounded-xl p-5">
        <h2 class="font-bold text-[#1B365D] mb-3">Resumen</h2>

        <div class="space-y-3 text-sm text-slate-600">
          <p><strong>Hoy:</strong> 15 incidencias</p>
          <p><strong>Este mes:</strong> 142</p>
          <p><strong>Tiempo medio:</strong> 3.2 días</p>
          <p><strong>Resueltas:</strong> 87%</p>
        </div>
      </div>

      <!-- CONTACT -->
      <button class="w-full bg-[#1B365D] text-white py-3 rounded-lg font-semibold hover:opacity-90 transition">
        Contactar Ayuntamiento
      </button>

    </div>

  </div>

</main>

</body>
</html>

@endsection