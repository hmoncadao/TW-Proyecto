<footer aria-label="Pie de página de GovConnect"
        class="relative z-0 bg-[#F8F9FA] dark:bg-slate-950 border-t border-[#C4C7CF] dark:border-slate-800 mt-auto">

    <div class="w-full py-6 sm:py-8 px-6 flex flex-col md:flex-row justify-between items-center gap-6 md:gap-0 max-w-[1280px] mx-auto">

        <!-- Nombre y Copyright -->
        <div class="text-center md:text-left">

            <span class="font-bold text-[#1B365D] block mb-1">
                GovConnect
            </span>

            <p class="text-[10px] sm:text-xs uppercase tracking-wider text-slate-500">
                © 2026 Ayuntamiento. Todos los derechos reservados.
            </p>

        </div>

        <!-- Links -->
        <nav aria-label="Enlaces del pie de página"
             class="flex flex-col sm:flex-row gap-4 sm:gap-8 items-center">

            <a href="/contacto"
               class="focus:outline-none focus-visible:ring-2 focus-visible:ring-[#1B365D] focus-visible:rounded text-[10px] sm:text-xs uppercase tracking-wider text-slate-500 hover:text-[#1B365D] flex items-center gap-2">
                
                <span class="material-symbols-outlined text-[16px]" aria-hidden="true">
                    mail
                </span>

                <span>Contacto</span>
            </a>

            <a href="{{ asset('pdf/como_se_hizo.pdf') }}" target="_blank"
               class="focus:outline-none focus-visible:ring-2 focus-visible:ring-[#1B365D] focus-visible:rounded text-[10px] sm:text-xs uppercase tracking-wider text-slate-500 hover:text-[#1B365D] flex items-center gap-2">

                <span class="material-symbols-outlined text-[16px]" aria-hidden="true">
                    description
                </span>

                <span>Cómo se hizo</span>
            </a>

        </nav>

        <!-- Etiqueta -->
        <div class="flex items-center gap-2 mt-2 md:mt-0">

            <span class="hidden sm:inline text-slate-300" aria-hidden="true">|</span>

            <span class="text-[10px] sm:text-xs uppercase tracking-wider text-[#1B365D] font-bold text-center">
                Gestión de Incidencias
            </span>

        </div>

    </div>

</footer>