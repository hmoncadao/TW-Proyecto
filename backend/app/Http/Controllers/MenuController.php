<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use Illuminate\Support\Facades\Cache;

class MenuController extends Controller
{
    public static function datos()
    {
        return Cache::remember('menu_datos', 60, function () {

            $hoy = now()->startOfDay();
            $inicioMes = now()->startOfMonth();

            return [
                // hoy
                'incidenciasHoy' => Incidencia::whereDate('created_at', $hoy)->count(),

                // este mes REAL
                'incidenciasMes' => Incidencia::where('created_at', '>=', $inicioMes)->count(),

                // total
                'total' => Incidencia::count(),

                // resueltas
                'resueltas' => Incidencia::where('estado', 'Resuelta')->count(),
            ];

        });
    }
}