<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;

class PanelController extends Controller
{
    public function index()
    {
        $incidencias = Incidencia::where('created_at', '>=', now()->subMonth())->get();

        $total = Incidencia::count();
        $resueltas = Incidencia::where('estado', 'Resuelta')->count();
        $pendientes = Incidencia::where('estado', 'Pendiente')->count();
        $enProceso = Incidencia::where('estado', 'En Progreso')->count();

        return view('panelAyuntamiento', compact(
            'incidencias',
            'total',
            'resueltas',
            'pendientes',
            'enProceso'
        ));
    }
}