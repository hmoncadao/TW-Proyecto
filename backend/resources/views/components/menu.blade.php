<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

<!-- BOTÓN MOBILE IZQUIERDO -->
<button
    id="menuBtn"
    class="fixed top-20 left-4 z-[10000] lg:hidden bg-white dark:bg-slate-800 w-11 h-11 rounded-lg shadow flex items-center justify-center"
>
    <span class="material-symbols-outlined">menu</span>
</button>

<!-- BOTÓN MOBILE DERECHO -->
<button
    id="rightMenuBtn"
    class="fixed top-20 right-4 z-[10000] lg:hidden bg-white dark:bg-slate-800 w-11 h-11 rounded-lg shadow flex items-center justify-center"
>
    <span class="material-symbols-outlined">dashboard</span>
</button>

<!-- OVERLAY -->
<div
    id="overlay"
    class="fixed inset-0 bg-black/50 z-[9998] hidden lg:hidden"
></div>

<!-- LEFT SIDEBAR (MENU) -->
<aside
    id="sidebar"
    class="
        bg-white dark:bg-slate-900
        border-r border-t border-[#C4C7CF] dark:border-slate-700
        fixed left-0 top-16 bottom-0
        z-[9999]
        flex flex-col
        w-64

        transform -translate-x-full
        transition-transform duration-300 ease-in-out

        lg:translate-x-0
    "
>

    <div class="p-6 pt-16 lg:pt-6">
        <h2 class="text-lg font-black text-[#1B365D] uppercase tracking-wider">
            MENU
        </h2>
        <p class="text-xs text-slate-500 font-medium">
            Selecciona la opción
        </p>
    </div>

    <nav class="flex-1 px-4 space-y-1 overflow-y-auto">

        <a class="flex items-center gap-3 px-3 py-3 rounded-lg transition
            text-slate-600 border-l-4 border-transparent
            hover:text-[#1B365D] hover:font-bold
            hover:bg-slate-50 hover:border-[#1B365D]"
            href="/"
        >
            <span class="material-symbols-outlined">home</span>
            <span class="text-sm">Página Principal</span>
        </a>

        @auth
        <a class="flex items-center gap-3 px-3 py-3 rounded-lg transition
            text-slate-600 border-l-4 border-transparent
            hover:text-[#1B365D] hover:font-bold
            hover:bg-slate-50 hover:border-[#1B365D]"
            href="{{ route('profile') }}"
        >
            <span class="material-symbols-outlined">account_circle</span>
            <span class="text-sm">Mi Perfil</span>
        </a>
        @endauth

        <a class="flex items-center gap-3 px-3 py-3 rounded-lg transition
            text-slate-600 border-l-4 border-transparent
            hover:text-[#1B365D] hover:font-bold
            hover:bg-slate-50 hover:border-[#1B365D]"
            href="/incidencias"
        >
            <span class="material-symbols-outlined">public</span>
            <span class="text-sm">Incidencias</span>
        </a>

        <a class="flex items-center gap-3 px-3 py-3 rounded-lg transition
            text-slate-600 border-l-4 border-transparent
            hover:text-[#1B365D] hover:font-bold
            hover:bg-slate-50 hover:border-[#1B365D]"
            href="/panel"
        >
            <span class="material-symbols-outlined">admin_panel_settings</span>
            <span class="text-sm">Panel Ayuntamiento</span>
        </a>

        <a class="flex items-center gap-3 px-3 py-3 rounded-lg transition
            text-slate-600 border-l-4 border-transparent
            hover:text-[#1B365D] hover:font-bold
            hover:bg-slate-50 hover:border-[#1B365D]"
            href="/reportar"
        >
            <span class="material-symbols-outlined">report_problem</span>
            <span class="text-sm">Reportar incidencia</span>
        </a>

        <a class="flex items-center gap-3 px-3 py-3 rounded-lg transition
            text-slate-600 border-l-4 border-transparent
            hover:text-[#1B365D] hover:font-bold
            hover:bg-slate-50 hover:border-[#1B365D]"
            href="/contacto"
        >
            <span class="material-symbols-outlined">mail</span>
            <span class="text-sm">Contacto</span>
        </a>

        <a class="flex items-center gap-3 px-3 py-3 rounded-lg transition
            text-slate-600 border-l-4 border-transparent
            hover:text-[#1B365D] hover:font-bold
            hover:bg-slate-50 hover:border-[#1B365D]"
            href="#"
        >
            <span class="material-symbols-outlined">description</span>
            <span class="text-sm">Cómo se hizo</span>
        </a>

    </nav>

    <div class="p-4 mt-auto border-t border-slate-100">
        <a class="flex items-center gap-3 px-3 py-3 text-slate-600 hover:bg-slate-50 rounded-lg transition" href="#">
            <span class="material-symbols-outlined">settings</span>
            <span class="text-sm">Settings</span>
        </a>
    </div>

</aside>

<!-- RIGHT SIDEBAR (DASHBOARD) -->
<aside
    id="rightSidebar"
    class="
        bg-white dark:bg-slate-900
        border-l border-t border-[#C4C7CF] dark:border-slate-700
        fixed right-0 top-16 bottom-0
        w-64
        flex flex-col
        z-[9999]

        transform translate-x-full
        transition-transform duration-300 ease-in-out

        lg:translate-x-0
    "
>

    <!-- HEADER -->
    <div class="p-6 pt-16 lg:pt-6 border-b border-slate-100">
        <h2 class="text-lg font-black text-[#1B365D] uppercase tracking-wider">
            Panel de información
        </h2>
        <p class="text-xs text-slate-500 font-medium py-1">
            Estado del sistema
        </p>
    </div>

    <!-- CONTENT -->
    <div class="flex-1 p-4 space-y-4 overflow-y-auto">

        <!-- SISTEMA -->
        <div class="bg-green-50 rounded-lg p-3">
            <p class="text-xs text-slate-500">Sistema</p>
            <p class="text-sm font-bold text-green-600">Operativo</p>
        </div>

        <!-- HOY -->
        <div class="bg-slate-50 rounded-lg p-3">
            <p class="text-xs text-slate-500">Incidencias hoy</p>
            <p class="text-lg font-bold text-[#1B365D]">
                {{ $incidenciasHoy ?? 0 }}
            </p>
        </div>

        <!-- MES -->
        <div class="bg-slate-50 rounded-lg p-3">
            <p class="text-xs text-slate-500">Este mes</p>
            <p class="text-lg font-bold text-[#1B365D]">
                {{ $incidenciasMes ?? 0 }}
            </p>
        </div>

        <!-- TOTAL -->
        <div class="bg-slate-50 rounded-lg p-3">
            <p class="text-xs text-slate-500">Total incidencias</p>
            <p class="text-lg font-bold text-[#1B365D]">
                {{ $total ?? 0 }}
            </p>
        </div>

        <!-- RESUELTAS -->
        <div class="bg-slate-50 rounded-lg p-3">
            <p class="text-xs text-slate-500">% resueltas</p>
            <p class="text-lg font-bold text-green-600">
                {{ ($total ?? 0) > 0 ? round((($resueltas ?? 0) / $total) * 100) : 0 }}%
            </p>
        </div>

        <!-- ACTIVIDAD -->
        <div class="bg-slate-50 rounded-lg p-3">
            <p class="text-xs text-slate-500">Actividad</p>
            <p class="text-sm text-slate-700">
                +{{ $incidenciasHoy ?? 0 }} nuevas hoy
            </p>
        </div>

    </div>

</aside>



<!-- JAVASCRIPT -->
<script>
document.addEventListener("DOMContentLoaded", () => {

    const sidebar = document.getElementById("sidebar");
    const rightSidebar = document.getElementById("rightSidebar");
    const overlay = document.getElementById("overlay");

    const menuBtn = document.getElementById("menuBtn");
    const rightMenuBtn = document.getElementById("rightMenuBtn");

    menuBtn.addEventListener("click", () => {
        rightSidebar.classList.add("translate-x-full");
        sidebar.classList.toggle("-translate-x-full");
        overlay.classList.toggle("hidden");
    });

    rightMenuBtn.addEventListener("click", () => {
        sidebar.classList.add("-translate-x-full");
        rightSidebar.classList.toggle("translate-x-full");
        overlay.classList.toggle("hidden");
    });

    overlay.addEventListener("click", () => {
        sidebar.classList.add("-translate-x-full");
        rightSidebar.classList.add("translate-x-full");
        overlay.classList.add("hidden");
    });

});
</script>