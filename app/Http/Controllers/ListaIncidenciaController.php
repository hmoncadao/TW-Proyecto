<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;

class ListaIncidenciaController extends Controller
{
    public function index(Request $request)
    {
        $query = Incidencia::query();

        // BUSCADOR
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('titulo', 'like', "%{$search}%")
                  ->orWhere('descripcion', 'like', "%{$search}%")
                  ->orWhere('id', $search);

            });
        }

        // FILTRO ESTADO
        if ($request->filled('estado')) {

            $query->where('estado', $request->estado);

        }

        // FILTRO CATEGORIA
        if ($request->filled('categoria')) {

            $query->where('categoria', $request->categoria);

        }

        // FILTRO MES
        if ($request->filled('mes')) {

            $query->whereMonth('created_at', $request->mes);

        }

        // FILTRO AÑO
        if ($request->filled('anio')) {

            $query->whereYear('created_at', $request->anio);

        }

        $incidencias = $query->latest()->get();

        return view('incidencias', compact('incidencias'));
    }

    // DETALLE INCIDENCIA
    public function show($id)
    {
        $incidencia = Incidencia::findOrFail($id);

        return view('detalleIncidencia', compact('incidencia'));
    }

    public function updateEstado(Request $request, $id)
{
    $incidencia = Incidencia::findOrFail($id);

    $request->validate([
        'estado' => 'required|in:Pendiente,En Progreso,Resuelta',
    ]);

    $incidencia->estado = $request->estado;
    $incidencia->save();

    return back()->with('success', 'Estado actualizado correctamente');
}
}