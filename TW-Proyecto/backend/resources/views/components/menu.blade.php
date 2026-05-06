<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

<aside class="bg-white dark:bg-slate-900 border-r border-[#C4C7CF] dark:border-slate-700 fixed left-0 top-16 h-[calc(100vh-64px)] z-40 flex flex-col w-48 sm:w-56 md:w-64">
    <div class="p-6">
        <h2 class="text-lg font-black text-[#1B365D] uppercase tracking-wider"> MENU </h2>
        <p class="text-xs text-slate-500 font-medium"> Selecciona la opción </p>
    </div>

    <nav class="flex-1 px-4 space-y-1">

        <!-- SOLO SE MUESTRA SI EL USUARIO ESTÁ LOGUEADO -->
        <a class="flex items-center gap-3 px-3 py-3 text-[#1B365D] dark:text-blue-400 font-bold border-l-4 border-[#1B365D] bg-slate-50 dark:bg-slate-800/50" href="{{ route('profile') }}">
            <span class="material-symbols-outlined">person</span>
            <span class="text-sm">Mi perfil</span>
        </a>
        
        <a class="flex items-center gap-3 px-3 py-3 text-[#1B365D] dark:text-blue-400 font-bold border-l-4 border-[#1B365D] bg-slate-50 dark:bg-slate-800/50" href="#">
            <span class="material-symbols-outlined">public</span>
            <span class="text-sm">Incidencias</span>
        </a>

        <a class="flex items-center gap-3 px-3 py-3 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800" href="#">
            <span class="material-symbols-outlined">admin_panel_settings</span>
            <span class="text-sm">Panel del ayuntamiento</span>
        </a>

        <a class="flex items-center gap-3 px-3 py-3 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800" href="#">
            <span class="material-symbols-outlined">report_problem</span>
            <span class="text-sm">Reportar incidencia</span>
        </a>

        <a class="flex items-center gap-3 px-3 py-3 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800" href="#">
            <span class="material-symbols-outlined">help</span>
            <span class="text-sm">Buscar incidencia</span>
        </a>

        <a class="flex items-center gap-3 px-3 py-3 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800" href="#">
            <span class="material-symbols-outlined">mail</span>
            <span class="text-sm">Contacto</span>
        </a>

        <a class="flex items-center gap-3 px-3 py-3 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800" href="#">
            <span class="material-symbols-outlined">description</span>
            <span class="text-sm">Sobre este Portal</span>
        </a>

    </nav>

    <div class="p-4 mt-auto border-t border-slate-100">
        <a class="flex items-center gap-3 px-3 py-3 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800" href="#">
            <span class="material-symbols-outlined">settings</span>
            <span class="text-sm">Settings</span>
        </a>
    </div>
</aside>