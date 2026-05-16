<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class MenuController extends Controller
{
    public static function datos()
    {
        return Cache::remember('menu_datos', 60, function () {

            $hoyInicio = Carbon::today()->startOfDay();
            $hoyFin = Carbon::today()->endOfDay();

            return [
                'incidenciasHoy' => Incidencia::whereBetween('created_at', [$hoyInicio, $hoyFin])->count(),

                'esteMes' => Incidencia::where('created_at', '>=', Carbon::now()->startOfMonth())->count(),

                'total' => Incidencia::count(),

                'resueltas' => Incidencia::where('estado', 'Resuelta')->count(),
            ];
        });
    }
}