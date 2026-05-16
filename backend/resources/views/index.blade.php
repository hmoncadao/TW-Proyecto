@extends('layouts.app')

@section('content')

<main class="bg-background text-on-background min-h-screen">
<!-- HERO -->
<section class="relative h-[650px] flex items-center justify-center overflow-hidden">

    <div class="absolute inset-0">
        <img class="w-full h-full object-cover"
            src="https://lh3.googleusercontent.com/aida-public/AB6AXuCdtZGAIj2fef_c3HRV7R0svlLUitshAxUvHshPjtpM6bkd_dyyPyr6MTt-EJiIlERRPVz_jBLibqfKLW3HeWP_gEorSH11xNUiGa9oWZib3jA-9J5bgVBF2cbn0ucrhflLpkU3s4NiyjGT-jravZjVqCZL2Z7zJxKW1qwThnn3ZjxYBpDt12N_A_ofprptKutL3uAmpC5YeFRp9Jr-zCPsyLJaXGaS4e6q3lXJpHTJ0vpnCQkIj9nL3v0oS4m5c4ZruFh6bEiYgA"/>

        <div class="absolute inset-0 bg-black/60"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-primary/80 via-primary/50 to-transparent"></div>
    </div>

    <div class="relative z-10 w-full max-w-[1280px] mx-auto px-6 md:px-8 flex justify-center">

        <div class="max-w-2xl text-center md:text-left">

            <h1 class="text-5xl font-bold text-white leading-tight mb-6">
                Tu ciudad, <span class="text-white/80">conectada y eficiente</span>
            </h1>

            <p class="text-white/80 text-lg mb-8">
                Participa activamente en la mejora de tu municipio.
            </p>

            <div class="flex gap-4 flex-wrap justify-center md:justify-start">

                <a href="/reportar"
                class="inline-block bg-white text-primary px-6 py-3 rounded-xl font-semibold shadow-lg hover:scale-105 transition">
                    Reportar incidencia
                </a>

                <a href="/panel"
                class="inline-block bg-white text-primary px-6 py-3 rounded-xl font-semibold shadow-lg hover:scale-105 transition">
                    Explorar servicios
                </a>

            </div>

        </div>

    </div>
</section>

<!-- ACTIVIDAD -->
<!-- ACTIVIDAD -->
<section class="relative z-20 -mt-14 px-6 md:px-8 flex justify-center">

    <div class="w-full max-w-[1280px] flex justify-center">

        <div class="w-full max-w-2xl">

            <div class="bg-white/90 backdrop-blur-md border border-gray-200 rounded-2xl p-6 shadow-lg">

                <div class="flex flex-col md:flex-row justify-between items-center gap-6">

                    <div class="text-center md:text-left flex-1">
                        <p class="font-bold text-lg" style="color:#1B365D;">
                            Actividad reciente
                        </p>

                        <p class="text-sm text-gray-500">
                            Datos actualizados en tiempo real
                        </p>
                    </div>

                    <div class="flex gap-10 text-center items-center justify-center flex-1">

                        <div>
                            <p class="text-3xl font-bold" style="color:#1B365D;">
                                {{ $resueltasHoy }}
                            </p>

                            <p class="text-sm text-gray-500">
                                Resueltas hoy
                            </p>
                        </div>

                        <div class="w-px h-10 bg-gray-200 hidden md:block"></div>

                        <div>
                            <p class="text-3xl font-bold" style="color:#1B365D;">
                                {{ $esteMes }}
                            </p>

                            <p class="text-sm text-gray-500">
                                Último mes
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</section>

<!-- ABOUT -->
<section class="py-28 bg-white">

    <div class="max-w-[1280px] mx-auto px-6 md:px-8">
    
        <div class="grid md:grid-cols-12 gap-16 items-center">

            <!-- TEXTO -->
            <div class="md:col-span-7">

                <span class="inline-block text-xs font-semibold tracking-[0.2em] uppercase text-[#1B365D]/70 mb-3">
                    Compromiso ciudadano
                </span>

                <h2 class="text-5xl font-bold text-[#1B365D] leading-tight mb-6">
                    Sobre el Ayuntamiento
                </h2>

                <p class="text-gray-600 text-lg leading-relaxed mb-5">
                    Nuestra misión es liderar una gestión municipal abierta, donde la transparencia digital no sea solo una meta, sino la base de nuestra relación con el ciudadano.
                </p>

                <p class="text-gray-600 text-lg leading-relaxed mb-10">
                    A través de GovConnect, eliminamos las barreras burocráticas, permitiendo que cada vecino sea un sensor activo del estado de su ciudad.
                </p>

                <div class="relative pl-6 border-l-4 border-[#1B365D]">

                    <p class="italic text-xl text-[#1B365D] leading-relaxed">
                        “Gobernar es escuchar. Digitalizar es facilitar la vida de nuestros vecinos.”
                    </p>

                    <p class="text-sm text-gray-500 mt-3">
                        — Alcaldía Municipal
                    </p>

                </div>

            </div>

            <!-- IMAGEN -->
            <div class="md:col-span-5 flex justify-center">

                <img class="rounded-2xl shadow-xl border border-gray-100 w-full max-w-md md:max-w-lg object-cover"
                     src="https://lh3.googleusercontent.com/aida-public/AB6AXuBLPH-JxU-Vv_6_Gl3B5XUAfpYlUkFowPLGzjeTt862E6BbmRQYW1NPnsmXiaN82r3xaJRq3RkQlh5eUf6SHCZI5Ic6JwQCDBA7AuFEKvVGR46X74acLHIWLEcaaKQScHNQpNoCvCOIoX15SGVd9D_VnUcWg55gcoX6oiQWKza7UnYTU_en2ZqT-A-vAPCAOr2NxX5UwJb9hJLGicA2FiYX8l42Bo0ep7MaCSd4DWY2iY-J4nnVUKL4-Rvk731yD65Y7uLqBnNWHQ"/>

            </div>

        </div>

    </div>

</section>

<!-- SERVICIOS -->
<section class="py-24 bg-gray-50">

    <div class="max-w-[1280px] mx-auto px-6 md:px-8">

        <!-- HEADER -->
        <div class="text-center mb-14">
            <h2 class="text-4xl font-bold text-[#1B365D]">
                Servicios clave
            </h2>
            <p class="text-gray-500 mt-3 max-w-xl mx-auto">
                Accede de forma rápida y sencilla a las herramientas más importantes de tu municipio.
            </p>
        </div>

        <!-- GRID BENTO -->
        <div class="grid grid-cols-1 md:grid-cols-4 md:grid-rows-2 gap-6 md:h-[500px]">

            <!-- CARD GRANDE -->
            <div class="md:col-span-2 md:row-span-2 bg-white border border-gray-200 p-8 flex flex-col justify-between hover:border-[#1B365D] transition">

                <div>

                    <div class="w-14 h-14 bg-[#1B365D] text-white flex items-center justify-center mb-6 rounded-lg">
                        <span class="material-symbols-outlined text-3xl">
                            campaign
                        </span>
                    </div>

                    <a href="/reportar" class="text-2xl font-bold text-[#1B365D] mb-4 hover:underline py-24">
                        Reporte de incidencias
                    </a>

                    <p class="text-gray-600 leading-relaxed">
                        Reporta baches, iluminación defectuosa o problemas de limpieza en segundos con geolocalización automática.
                    </p>

                </div>

                <a href="/reportar" class="mt-8 text-[#1B365D] font-semibold flex items-center gap-2 hover:gap-3 transition">
                    Iniciar reporte
                    <span class="material-symbols-outlined">
                        arrow_forward
                    </span>
                </a>

            </div>

            <!-- CARD MEDIANA -->
            <div class="md:col-span-2 bg-white border border-gray-200 p-6 flex items-center gap-5 hover:border-[#1B365D] transition">

                <div class="w-12 h-12 bg-blue-50 text-[#1B365D] flex items-center justify-center rounded-lg">
                    <span class="material-symbols-outlined">
                        bar_chart
                    </span>
                </div>

                <div class="flex-1">
                    <h3 class="font-bold text-[#1B365D]">
                        Analítica pública
                    </h3>
                    <p class="text-sm text-gray-600">
                        Estado global de incidencias y tiempos de respuesta.
                    </p>
                </div>


            </div>

            <!-- CARD PEQUEÑA -->
            <div class="bg-white border border-gray-200 p-6 flex flex-col hover:border-[#1B365D] transition">

                <div class="w-10 h-10 bg-gray-100 text-[#1B365D] flex items-center justify-center rounded-lg mb-4">
                    <span class="material-symbols-outlined">
                        contacts
                    </span>
                </div>

                <h3 class="font-semibold text-[#1B365D] mb-2">
                    Directorio
                </h3>

                <p class="text-sm text-gray-600 flex-1">
                    Contactos directos con departamentos municipales.
                </p>

            </div>

            <!-- CARD PEQUEÑA -->
            <div class="bg-white border border-gray-200 p-6 flex flex-col hover:border-[#1B365D] transition">

                <div class="w-10 h-10 bg-gray-100 text-[#1B365D] flex items-center justify-center rounded-lg mb-4">
                    <span class="material-symbols-outlined">
                        support_agent
                    </span>
                </div>

                <h3 class="font-semibold text-[#1B365D] mb-2">
                    Soporte
                </h3>

                <p class="text-sm text-gray-600 flex-1">
                    Ayuda ciudadana y asistencia técnica del portal.
                </p>

            </div>

        </div>

    </div>

</section>

<!-- BENEFICIOS -->
<section class="py-24 px-8">

    <div class="max-w-[1280px] mx-auto w-full">

        <div class="grid md:grid-cols-2 gap-16 items-center">

            <div class="flex justify-center">
                <img class="rounded-2xl shadow-lg border w-full max-w-md object-cover"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuD51zHjA0BSvvIW0ijXlcFkQKdKELtgjvJV3XDKOg47exyLo6nIN2eUD7UriSxIB2DIeAojX_fKygi4coekTjKAl-Jan912HVkdNuOxvRoWDlS4VNBhPpqAjyLHywq3lB3ecQeHeE4kPZ9l2GKsxruzpT9D3g2tXWxuLMYGpA1hSOUcH8d2_xZpIUWTJJ6fxjspGtKiQah8LUMdtYf1jqfRgxJ6vwQLfwqFrrXzhO3HN2wpSJwFo2OcNT-KNSUl2gjVmP6srxqokg"/>
            </div>

            <div class="text-center md:text-left max-w-xl mx-auto">
<h2 class="text-4xl font-bold mb-10" style="color:#1B365D;">
    ¿Por qué GovConnect?
</h2>

<div class="space-y-10 text-gray-600">

    <!-- ITEM 1 -->
    <div class="flex items-start gap-4">

        <span class="material-symbols-outlined text-3xl mt-1" style="color:#1B365D;">
            bolt
        </span>

        <div>
            <p class="text-lg font-semibold mb-1" style="color:#1B365D;">
                Respuesta más rápida y eficiente
            </p>
            <p class="text-base leading-relaxed">
                La asignación automática de tareas reduce los tiempos de espera burocráticos en un 40%.
            </p>
        </div>

    </div>

    <!-- ITEM 2 -->
    <div class="flex items-start gap-4">

        <span class="material-symbols-outlined text-3xl mt-1" style="color:#1B365D;">
            location_on
        </span>

        <div>
            <p class="text-lg font-semibold mb-1" style="color:#1B365D;">
                Geolocalización precisa
            </p>
            <p class="text-base leading-relaxed">
                Ubica incidencias con precisión milimétrica para que los equipos lleguen exactamente donde se les necesita.
            </p>
        </div>

    </div>

    <!-- ITEM 3 -->
    <div class="flex items-start gap-4">

        <span class="material-symbols-outlined text-3xl mt-1" style="color:#1B365D;">
            visibility
        </span>

        <div>
            <p class="text-lg font-semibold mb-1" style="color:#1B365D;">
                Seguimiento en tiempo real
            </p>
            <p class="text-base leading-relaxed">
                Recibe notificaciones sobre el progreso de tu reporte hasta su resolución final.
            </p>
        </div>

    </div>

</div>

</section>

</main>

@endsection