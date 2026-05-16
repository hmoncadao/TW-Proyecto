<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;

class IndexController extends Controller
{
    public function index()
    {
        $resueltasHoy = Incidencia::where('estado', 'Resuelta')
            ->whereDate('updated_at', today())
            ->count();

        $esteMes = Incidencia::where('created_at', '>=', now()->subMonth())
            ->count();

        return view('index', compact(
            'resueltasHoy',
            'esteMes'
        ));
    }
}