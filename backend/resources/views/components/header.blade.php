<header class="bg-white dark:bg-slate-900 border-b border-[#C4C7CF] dark:border-slate-700 fixed top-0 left-0 right-0 z-50">

    <div class="flex justify-between items-center h-16 w-full px-6 max-w-[1280px] mx-auto">

        <!-- LOGO -->
        <div class="flex items-center">
        <a href="/" class="text-xl font-bold text-[#1B365D] dark:text-blue-400 tracking-tight">
            GovConnect
        </a>
        </div>

        <!-- BOTONES -->
        <div class="flex items-center gap-3 ml-auto">

            @auth

                <span class="text-xs md:text-sm font-medium text-slate-700 dark:text-slate-300">
                    {{ auth()->user()->name }}
                </span>

                <a
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="px-3 py-1.5 md:px-6 md:py-2 text-sm bg-red-600 text-white font-label-bold rounded-lg hover:opacity-90 active:scale-[0.98] transition-all cursor-pointer"
                >
                    Cerrar Sesión
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            @else

                <a href="{{ route('login') }}"
                   class="px-3 py-1.5 md:px-6 md:py-2 text-sm md:text-base bg-[#1B365D] text-white font-label-bold rounded-lg hover:opacity-90 active:scale-[0.98] transition-all">
                    Iniciar Sesión
                </a>

                <a href="{{ route('register') }}"
                   class="px-3 py-1.5 md:px-6 md:py-2 text-sm md:text-base bg-[#1B365D] text-white font-label-bold rounded-lg hover:opacity-90 active:scale-[0.98] transition-all">
                    Registrarse
                </a>

            @endauth

        </div>

    </div>

</header>