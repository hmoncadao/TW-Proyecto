<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Incidencia;
use Carbon\Carbon;

class MenuServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('components.menu', function ($view) {

            $total = Incidencia::count();

            $hoy = Carbon::today();
            $inicioMes = Carbon::now()->startOfMonth();

            $incidenciasHoy = Incidencia::whereDate('created_at', $hoy)->count();

            $incidenciasMes = Incidencia::where('created_at', '>=', $inicioMes)->count();

            $resueltas = Incidencia::where('estado', 'Resuelta')->count();

            $tiempoMedio = 3.2;

            $porcentajeResueltas = $total > 0
                ? round(($resueltas / $total) * 100)
                : 0;

            $view->with([
                'incidenciasHoy' => $incidenciasHoy,
                'incidenciasMes' => $incidenciasMes,
                'total' => $total,
                'porcentajeResueltas' => $porcentajeResueltas,
                'tiempoMedio' => $tiempoMedio,
            ]);
        });
    }
}