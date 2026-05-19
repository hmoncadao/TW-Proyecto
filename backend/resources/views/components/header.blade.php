<header class="bg-white dark:bg-slate-900 border-b border-[#C4C7CF] dark:border-slate-700 fixed top-0 left-0 right-0 z-50">

    <div class="flex justify-between items-center h-16 w-full px-6 max-w-[1280px] mx-auto">

        <!-- Nombre (Logo) -->
        <div class="flex items-center">
        <a href="/" class="text-xl font-bold text-[#1B365D] dark:text-blue-400 tracking-tight">
            GovConnect
        </a>
        </div>

        <!-- Botones -->
        <div class="flex items-center gap-3 ml-auto">

            @auth

                <div class="flex items-center gap-2">
                    <span class="text-xs md:text-sm font-medium text-slate-700 dark:text-slate-300">
                        {{ auth()->user()->name }}
                    </span>
                    @if(auth()->user()->isAdmin())
                        <span class="text-xs font-bold bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400 px-2 py-1 rounded-full">
                            Admin
                        </span>
                    @else
                        <span class="text-xs font-bold bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 px-2 py-1 rounded-full">
                            Usuario Normal
                        </span>
                    @endif
                </div>

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

                <span class="text-xs font-bold bg-gray-100 dark:bg-gray-900/30 text-gray-700 dark:text-gray-400 px-2 py-1 rounded-full">
                    No identificado
                </span>

                <a href="{{ route('login.show') }}"
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