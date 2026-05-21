@php
function active($route) {
    return request()->routeIs($route)
        ? 'text-[#1B365D] font-bold bg-slate-50 border-[#1B365D]'
        : 'text-slate-600 border-transparent hover:text-[#1B365D] hover:font-bold hover:bg-slate-50 hover:border-[#1B365D]';
}
@endphp

<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

<!-- BOTÓN IZQUIERDO -->
<button
    id="menuBtn"
    aria-label="Abrir menú principal"
    aria-controls="sidebar"
    aria-expanded="false"
    class="fixed top-20 left-4 z-[10000] lg:hidden bg-white dark:bg-slate-800 w-11 h-11 rounded-lg shadow flex items-center justify-center"
>
    <span class="material-symbols-outlined" aria-hidden="true">menu</span>
</button>

<!-- BOTÓN DERECHO -->
<button
    id="rightMenuBtn"
    aria-label="Abrir panel de información"
    aria-controls="rightSidebar"
    aria-expanded="false"
    class="fixed top-20 right-4 z-[10000] lg:hidden bg-white dark:bg-slate-800 w-11 h-11 rounded-lg shadow flex items-center justify-center"
>
    <span class="material-symbols-outlined" aria-hidden="true">dashboard</span>
</button>

<!-- OVERLAY -->
<div id="overlay" aria-hidden="true" class="fixed inset-0 bg-black/50 z-[9998] hidden lg:hidden"></div>

<!-- LEFT SIDEBAR -->
<aside
    id="sidebar"
    aria-hidden="true"
    class="bg-white dark:bg-slate-900 border-r border-t border-[#C4C7CF] dark:border-slate-700
    fixed left-0 top-16 bottom-0 z-[9999] flex flex-col w-64
    transform -translate-x-full transition-transform duration-300 ease-in-out
    lg:translate-x-0"
>

    <div class="p-6 pt-16 lg:pt-6">
        <h2 class="text-lg font-black text-[#1B365D] uppercase tracking-wider">MENU</h2>
        <p class="text-xs text-slate-500 font-medium">Selecciona la opción</p>
    </div>

    <nav class="flex-1 px-4 space-y-1 overflow-y-auto">

        @auth
        @if(Auth::user()->isAdmin())
        <a href="{{ route('admin.incidencias') }}"
           class="flex items-center gap-3 px-3 py-3 rounded-lg transition border-l-4
           text-amber-700 bg-amber-50 hover:bg-amber-100 hover:border-amber-500 font-semibold">
            <span class="material-symbols-outlined" aria-hidden="true">verified_user</span>
            <span class="text-sm">Panel Admin</span>
        </a>
        @endif

        <a href="{{ route('profile') }}"
           aria-current="{{ request()->routeIs('profile') ? 'page' : 'false' }}"
           class="flex items-center gap-3 px-3 py-3 rounded-lg transition border-l-4 {{ active('profile') }}">
            <span class="material-symbols-outlined" aria-hidden="true">account_circle</span>
            <span class="text-sm">Mi Perfil</span>
        </a>
        @endauth

        <a href="/"
           aria-current="{{ request()->is('/') ? 'page' : 'false' }}"
           class="flex items-center gap-3 px-3 py-3 rounded-lg transition border-l-4 {{ request()->is('/') ? 'text-[#1B365D] font-bold bg-slate-50 border-[#1B365D]' : 'text-slate-600 border-transparent hover:text-[#1B365D] hover:font-bold hover:bg-slate-50 hover:border-[#1B365D]' }}">
            <span class="material-symbols-outlined" aria-hidden="true">home</span>
            <span class="text-sm">Página Principal</span>
        </a>

        <a href="/panel"
           class="flex items-center gap-3 px-3 py-3 rounded-lg transition border-l-4 {{ request()->is('panel*') ? 'text-[#1B365D] font-bold bg-slate-50 border-[#1B365D]' : 'text-slate-600 border-transparent hover:text-[#1B365D] hover:font-bold hover:bg-slate-50 hover:border-[#1B365D]' }}">
            <span class="material-symbols-outlined" aria-hidden="true">admin_panel_settings</span>
            <span class="text-sm">Panel Ayuntamiento</span>
        </a>

        <a href="/reportar"
           class="flex items-center gap-3 px-3 py-3 rounded-lg transition border-l-4 {{ request()->is('reportar') ? 'text-[#1B365D] font-bold bg-slate-50 border-[#1B365D]' : 'text-slate-600 border-transparent hover:text-[#1B365D] hover:font-bold hover:bg-slate-50 hover:border-[#1B365D]' }}">
            <span class="material-symbols-outlined" aria-hidden="true">report_problem</span>
            <span class="text-sm">Reportar incidencia</span>
        </a>

        <a href="/incidencias"
           class="flex items-center gap-3 px-3 py-3 rounded-lg transition border-l-4 {{ request()->is('incidencias') ? 'text-[#1B365D] font-bold bg-slate-50 border-[#1B365D]' : 'text-slate-600 border-transparent hover:text-[#1B365D] hover:font-bold hover:bg-slate-50 hover:border-[#1B365D]' }}">
            <span class="material-symbols-outlined" aria-hidden="true">public</span>
            <span class="text-sm">Incidencias</span>
        </a>

        <a href="/contacto"
           class="flex items-center gap-3 px-3 py-3 rounded-lg transition border-l-4 {{ request()->is('contacto') ? 'text-[#1B365D] font-bold bg-slate-50 border-[#1B365D]' : 'text-slate-600 border-transparent hover:text-[#1B365D] hover:font-bold hover:bg-slate-50 hover:border-[#1B365D]' }}">
            <span class="material-symbols-outlined" aria-hidden="true">mail</span>
            <span class="text-sm">Contacto</span>
        </a>

        <a href="{{ asset('pdf/como_se_hizo.pdf') }}" target="_blank"
           class="flex items-center gap-3 px-3 py-3 rounded-lg transition text-slate-600 hover:text-[#1B365D] hover:bg-slate-50">
            <span class="material-symbols-outlined" aria-hidden="true">description</span>
            <span class="text-sm">Cómo se hizo</span>
        </a>

    </nav>
</aside>

<!-- RIGHT SIDEBAR -->
@php($datos = app(\App\Http\Controllers\MenuController::class)::datos())

<aside
    id="rightSidebar"
    aria-hidden="true"
    class="bg-white dark:bg-slate-900 border-l border-t border-[#C4C7CF] dark:border-slate-700
    fixed right-0 top-16 bottom-0 w-64 flex flex-col z-[9999]
    transform translate-x-full transition-transform duration-300 ease-in-out
    lg:translate-x-0"
>

    <div class="p-6 pt-16 lg:pt-6 border-b border-slate-100">
        <h2 class="text-lg font-black text-[#1B365D] uppercase tracking-wider">
            Panel de Información
        </h2>
        <p class="text-xs text-slate-500 font-medium py-1">
            Estado del sistema
        </p>
    </div>

    <div class="flex-1 p-4 space-y-4 overflow-y-auto">

        <div class="bg-green-50 rounded-lg p-3">
            <p class="text-xs text-slate-500">Sistema</p>
            <p class="text-sm font-bold text-green-600">Operativo</p>
        </div>

        <div class="bg-slate-50 rounded-lg p-3">
            <p class="text-xs text-slate-500">Incidencias hoy</p>
            <p class="text-lg font-bold text-[#1B365D]">{{ $datos['incidenciasHoy'] }}</p>
        </div>

        <div class="bg-slate-50 rounded-lg p-3">
            <p class="text-xs text-slate-500">Este mes</p>
            <p class="text-lg font-bold text-[#1B365D]">{{ $datos['esteMes'] }}</p>
        </div>

        <div class="bg-slate-50 rounded-lg p-3">
            <p class="text-xs text-slate-500">Total</p>
            <p class="text-lg font-bold text-[#1B365D]">{{ $datos['total'] }}</p>
        </div>

        <div class="bg-slate-50 rounded-lg p-3">
            <p class="text-xs text-slate-500">% resueltas</p>
            <p class="text-lg font-bold text-green-600">{{ $datos['porcentajeResueltas'] }}%</p>
        </div>

    </div>

</aside>

<style>
:focus-visible {
    outline: 2px solid #1B365D;
    outline-offset: 2px;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", () => {

    const sidebar = document.getElementById("sidebar");
    const rightSidebar = document.getElementById("rightSidebar");
    const overlay = document.getElementById("overlay");

    const menuBtn = document.getElementById("menuBtn");
    const rightMenuBtn = document.getElementById("rightMenuBtn");

    function closeAll() {
        sidebar.classList.add("-translate-x-full");
        rightSidebar.classList.add("translate-x-full");
        overlay.classList.add("hidden");

        sidebar.setAttribute("aria-hidden", "true");
        rightSidebar.setAttribute("aria-hidden", "true");

        menuBtn.setAttribute("aria-expanded", "false");
        rightMenuBtn.setAttribute("aria-expanded", "false");
    }

    menuBtn.addEventListener("click", () => {

        const isOpen = !sidebar.classList.contains("-translate-x-full");

        closeAll();

        if (!isOpen) {
            sidebar.classList.remove("-translate-x-full");
            overlay.classList.remove("hidden");

            sidebar.setAttribute("aria-hidden", "false");
            menuBtn.setAttribute("aria-expanded", "true");
        }
    });

    rightMenuBtn.addEventListener("click", () => {

        const isOpen = !rightSidebar.classList.contains("translate-x-full");

        closeAll();

        if (!isOpen) {
            rightSidebar.classList.remove("translate-x-full");
            overlay.classList.remove("hidden");

            rightSidebar.setAttribute("aria-hidden", "false");
            rightMenuBtn.setAttribute("aria-expanded", "true");
        }
    });

    overlay.addEventListener("click", closeAll);

    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") closeAll();
    });

});
</script>