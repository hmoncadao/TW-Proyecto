<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'titulo' => 'required|string|max:255',
            'categoria' => 'required|string',
            'descripcion' => 'required|string',
            'ubicacion' => 'required|string',
            'fotografia' => 'required|image|mimes:jpeg,png,jpg|max:5000',
        ]);

        $rutaFotografia = null;
        if ($request->hasFile('fotografia')) {
            $rutaFotografia = $request->file('fotografia')->store('incidencia','public');
        }

        Incidencia::create([
            'titulo' => $request->titulo,
            'categoria' => $request->categoria,
            'descripcion' => $request->descripcion,
            'ubicacion' => $request->ubicacion,
            'fotografia' => $rutaFotografia,
        ]);

        return back()->with('success', '¡Su reporte ha sido enviado con éxito!' );

    }    


}
