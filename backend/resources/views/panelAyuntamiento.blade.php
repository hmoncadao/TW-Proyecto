@extends('layouts.app')

@section('content')

<main class="max-w-[1280px] mx-auto px-6 sm:px-8 lg:px-10 pt-28 pb-20 space-y-10">

  <!-- TITLE -->
<section class="mb-6">
    <h1 class="text-3xl font-bold text-[#1B365D] dark:text-blue-400 mb-2 pt-6 lg:pt-0">
        Panel del Ayuntamiento
    </h1>

    <div class="mt-6 bg-white border border-[#C4C7CF] rounded-xl p-6">

        <p class="text-gray-600 leading-relaxed mb-4">
            Esta plataforma es el centro de control de incidencias urbanas del municipio. Aquí se recogen los avisos enviados por la ciudadanía, junto con su ubicación y el estado en el que se encuentran, todo actualizado en tiempo real.
        </p>

        <p class="text-gray-600 leading-relaxed mb-4">
            El sistema ayuda a los equipos municipales a organizar y priorizar las incidencias para darles una respuesta más rápida y eficiente. También permite hacer un seguimiento claro de cada caso desde que se reporta hasta que se resuelve.
        </p>

        <p class="text-gray-600 leading-relaxed">
            Queremos contar contigo: tu participación es clave para mejorar la ciudad. Puedes reportar problemas que veas en tu entorno y ayudar a que entre todos hagamos una ciudad más limpia, segura y funcional.
        </p>

    </div>
</section>

  <!-- MAP -->
  <section class="grid grid-cols-1 lg:grid-cols-4 gap-6">

    <div class="lg:col-span-3 relative h-[500px] rounded-xl overflow-hidden border bg-white">
      
      <img class="w-full h-full object-cover"
           src="https://lh3.googleusercontent.com/aida-public/AB6AXuDNrVq3B2KlSvOOCfByXZz8AtaoDztKzI8wEPXg6PwFbc4Iemr3HkMAEvx_53qPmGZgd9X-0pjHX3bx0ruL3ek41Yrf08y6-2FF6HAW6KCA_xUkydm5g-2I-33fSC_EfraOLcSPwonEgTJrmGqrq_hCxQTKuTDUbn0ikqoWhvlDnVTGfYC_QjdI1WFPQMEt4AQ0mjO20cRJsd-3YXgcmQN-zjq5Frz1DpV9If4u7VqHzP0YBWFIiEm2n0emqGiLfltR03wb11I7VA"/>

      <!-- PIN -->
      <div class="absolute top-1/3 left-1/3 group cursor-pointer">
        <div class="bg-red-500 text-white p-2 rounded-full">
          <span class="material-symbols-outlined text-sm">warning</span>
        </div>
        <div class="opacity-0 group-hover:opacity-100 absolute -top-8 left-1/2 -translate-x-1/2 bg-white text-xs px-2 py-1 rounded shadow">
          Bache Calle Mayor
        </div>
      </div>

    </div>

    <!-- STATS -->
    <aside class="bg-white border rounded-xl p-5 space-y-4">
      <h2 class="font-bold text-blue-900">Resumen</h2>

      <div class="flex justify-between">
        <span>Total</span>
        <b>1,284</b>
      </div>

      <div class="flex justify-between">
        <span>Resueltas</span>
        <b class="text-green-600">842</b>
      </div>

      <div class="flex justify-between">
        <span>Tiempo medio</span>
        <b>4.2d</b>
      </div>

      <button class="w-full mt-4 bg-blue-900 text-white py-2 rounded-lg">
        Reportar incidencia
      </button>
    </aside>

  </section>

  <!-- TABLE -->
  <section class="bg-white border rounded-xl overflow-hidden">

    <div class="p-4 border-b font-bold text-blue-900">
      Incidencias recientes
    </div>

    <table class="w-full text-sm">
      <tbody>

        <tr class="hover:bg-gray-50 transition">
          <td class="p-4">Baches</td>
          <td class="p-4 text-red-600">Pendiente</td>
          <td class="p-4">Calle Alcalá</td>
          <td class="p-4 text-right">2h</td>
        </tr>

        <tr class="hover:bg-gray-50 transition">
          <td class="p-4">Iluminación</td>
          <td class="p-4 text-yellow-600">En proceso</td>
          <td class="p-4">Plaza Sol</td>
          <td class="p-4 text-right">5h</td>
        </tr>

        <tr class="hover:bg-gray-50 transition">
          <td class="p-4">Residuos</td>
          <td class="p-4 text-green-600">Solucionado</td>
          <td class="p-4">Gran Vía</td>
          <td class="p-4 text-right">Ayer</td>
        </tr>

      </tbody>
    </table>

  </section>

</main>

@endsection