<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

<!-- BOTÓN MOBILE -->
<button
    id="menuBtn"
    class="fixed top-20 left-4 z-50 md:hidden bg-white dark:bg-slate-800 w-11 h-11 rounded-lg shadow flex items-center justify-center"
>
    <span class="material-symbols-outlined">menu</span>
</button>

<!-- OVERLAY -->
<div
    id="overlay"
    class="fixed inset-0 bg-black/50 z-40 hidden md:hidden"
></div>

<!-- LEFT SIDEBAR (MENU) -->
<aside
    id="sidebar"
    class="
        bg-white dark:bg-slate-900
        border-r border-t border-[#C4C7CF] dark:border-slate-700
        fixed left-0 top-16
        h-[calc(100vh-64px)]
        z-50
        flex flex-col
        w-64

        transform -translate-x-full
        transition-transform duration-300 ease-in-out

        md:translate-x-0
    "
>

    <div class="p-6">
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

        <a class="flex items-center gap-3 px-3 py-3 rounded-lg transition
            text-slate-600 border-l-4 border-transparent
            hover:text-[#1B365D] hover:font-bold
            hover:bg-slate-50 hover:border-[#1B365D]"
            href="#"
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
            href="#"
        >
            <span class="material-symbols-outlined">help</span>
            <span class="text-sm">Buscar incidencia</span>
        </a>

        <a class="flex items-center gap-3 px-3 py-3 rounded-lg transition
            text-slate-600 border-l-4 border-transparent
            hover:text-[#1B365D] hover:font-bold
            hover:bg-slate-50 hover:border-[#1B365D]"
            href="#"
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
        fixed right-0 top-16
        h-[calc(100vh-64px)]
        w-64
        flex flex-col
        z-40
        hidden md:flex
    "
>

    <!-- HEADER -->
    <div class="p-6 border-b border-slate-100">
        <h2 class="text-lg font-black text-[#1B365D] uppercase tracking-wider">
            Dashboard
        </h2>
        <p class="text-xs text-slate-500 font-medium">
            Estado del sistema
        </p>
    </div>

    <!-- CONTENT -->
    <div class="flex-1 p-4 space-y-4 overflow-y-auto">

        <div class="bg-green-50 rounded-lg p-3">
            <p class="text-xs text-slate-500">Sistema</p>
            <p class="text-sm font-bold text-green-600">Operativo</p>
        </div>

        <div class="bg-slate-50 rounded-lg p-3">
            <p class="text-xs text-slate-500">Incidencias hoy</p>
            <p class="text-lg font-bold text-[#1B365D]">15</p>
        </div>

        <div class="bg-slate-50 rounded-lg p-3">
            <p class="text-xs text-slate-500">Este mes</p>
            <p class="text-lg font-bold text-[#1B365D]">142</p>
        </div>

        <div class="bg-slate-50 rounded-lg p-3">
            <p class="text-xs text-slate-500">Tiempo medio</p>
            <p class="text-lg font-bold text-[#1B365D]">3.2 días</p>
        </div>

        <div class="bg-slate-50 rounded-lg p-3">
            <p class="text-xs text-slate-500">% resueltas</p>
            <p class="text-lg font-bold text-green-600">87%</p>
        </div>

        <div class="bg-slate-50 rounded-lg p-3">
            <p class="text-xs text-slate-500">Actividad</p>
            <p class="text-sm text-slate-700">+3 nuevas incidencias</p>
        </div>

    </div>

</aside>