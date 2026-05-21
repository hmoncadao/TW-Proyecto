<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombre'  => 'required|string|max:100',
            'email'   => 'required|email',
            'mensaje' => 'required|string|max:2000',
        ]);

        Mensaje::create([
            'nombre'  => $request->nombre,
            'email'   => $request->email,
            'mensaje' => $request->mensaje,
        ]);

        return back()->with('success', 'Formulario enviado correctamente, en breve nos pondremos en contacto con uested');
    }
}