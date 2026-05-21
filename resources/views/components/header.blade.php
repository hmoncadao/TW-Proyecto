<header role="banner" aria-label="Cabecera principal del sistema" class="bg-white dark:bg-slate-900 border-b border-[#C4C7CF] dark:border-slate-700 fixed top-0 left-0 right-0 z-50">

    <div class="flex justify-between items-center h-16 w-full px-4 sm:px-6 max-w-[1280px] mx-auto gap-3">

        <!-- Logo -->
        <div class="flex items-center shrink-0">
            <a aria-label="Ir a la página de inicio - GovConnect" href="/" class="text-lg sm:text-xl md:text-2xl font-bold text-[#1B365D] dark:text-blue-400 tracking-tight whitespace-nowrap">
                GovConnect
            </a>
        </div>

        <!-- Zona derecha -->
        <div class="flex items-center gap-2 sm:gap-3 ml-auto min-w-0">

            @auth

                <!-- Usuario -->
                <div class="flex items-center gap-2 text-center min-w-0">

                    <span title="{{ auth()->user()->name }}"> class="text-sm sm:text-base md:text-lg font-semibold text-slate-700 dark:text-slate-300 truncate max-w-[120px] sm:max-w-[170px] md:max-w-none">
                        {{ auth()->user()->name }}
                    </span>

                    @if(auth()->user()->isAdmin())
                        <span title="Admin" aria-label="Rol del usuario: administrador">class="text-xs sm:text-sm font-bold bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-300 px-2 sm:px-3 py-1 rounded-full whitespace-nowrap">
                            Admin
                        </span>
                    @else
                        <span title="Usuario" aria-label="Rol del usuario: usuario"> class="text-xs sm:text-sm font-bold bg-purple-100 dark:bg-purple-900/30 text-purple-700 dark:text-purple-300 px-2 sm:px-3 py-1 rounded-full whitespace-nowrap">
                            Usuario
                        </span>
                    @endif

                </div>

                <!-- Logout -->
                <a
                    typle = "button" aria-label="Cerrar Sesión" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="flex items-center justify-center px-3 sm:px-4 py-2 sm:py-2.5 text-sm sm:text-base bg-red-600 text-white font-semibold rounded-lg hover:opacity-90 active:scale-[0.98] transition-all whitespace-nowrap"
                >
                    Cerrar Sesión
                </a>

                <form id="logout-form" aria-hidden="true" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>

            @else

                <span class="text-xs sm:text-sm font-bold bg-gray-100 dark:bg-gray-900/30 text-gray-700 dark:text-gray-400 px-2 sm:px-3 py-1 rounded-full whitespace-nowrap">
                    Invitado
                </span>

                <a sria-label="Iniciar Sesion" href="{{ route('login.show') }}"
                   class="px-3 sm:px-4 py-2 sm:py-2.5 text-sm sm:text-base bg-[#1B365D] text-white font-semibold rounded-lg hover:opacity-90 active:scale-[0.98] transition-all whitespace-nowrap">
                    Entrar
                </a>

                <a href="{{ route('register') }}"
                   class="px-3 sm:px-4 py-2 sm:py-2.5 text-sm sm:text-base bg-[#1B365D] text-white font-semibold rounded-lg hover:opacity-90 active:scale-[0.98] transition-all whitespace-nowrap">
                    Registro
                </a>

            @endauth

        </div>

    </div>

</header>