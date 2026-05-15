<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;

class ListaIncidenciaController extends Controller
{
    public function index(Request $request)
    {
        $query = Incidencia::query();

        // 🔎 BUSCADOR (ID, título, descripción)
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('titulo', 'like', "%$search%")
                  ->orWhere('descripcion', 'like', "%$search%")
                  ->orWhere('id', $search);
            });
        }

        // 📌 FILTRO ESTADO
        if ($request->filled('estado')) {
            $query->where('estado', $request->estado);
        }

        // 📌 FILTRO CATEGORÍA
        if ($request->filled('categoria')) {
            $query->where('categoria', $request->categoria);
        }

        // 📅 FILTRO MES
        if ($request->filled('mes')) {
            $query->whereMonth('created_at', $request->mes);
        }

        // 📅 FILTRO AÑO
        if ($request->filled('anio')) {
            $query->whereYear('created_at', $request->anio);
        }

        $incidencias = $query->latest()->get();

        return view('incidencias', compact('incidencias'));
    }
}