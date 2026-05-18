<?php
namespace App\Http\Controllers;
use App\Models\Incidencia;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    // Panel principal: lista todas las incidencias
    public function index(Request $request)
    {
        $query = Incidencia::query();
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('titulo', 'like', "%{$search}%")
                  ->orWhere('descripcion', 'like', "%{$search}%")
                  ->orWhere('id', $search);
            });
        }
        if ($request->filled('estado')) {
            $query->where('estado', $request->estado);
        }
        if ($request->filled('categoria')) {
            $query->where('categoria', $request->categoria);
        }
        $incidencias = $query->latest()->paginate(15);
        $mensajes = \App\Models\Mensaje::latest()->get();
        return view('adminIncidencias', compact('incidencias', 'mensajes'));
    }
    // Cambiar el estado de una incidencia
    public function updateEstado(Request $request, $id)
    {
        $incidencia = Incidencia::findOrFail($id);
        $request->validate([
            'estado' => 'required|in:Pendiente,En Progreso,Resuelta',
        ]);
        $incidencia->estado = $request->estado;
        $incidencia->save();

        return back()->with('success', "Estado de la incidencia #{$id} actualizado a '{$request->estado}'.");
    }
    // Eliminar una incidencia
    public function destroy($id)
    {
        $incidencia = Incidencia::findOrFail($id);
        $incidencia->delete();

        return back()->with('success', "Incidencia #{$id} eliminada correctamente.");
    }
    // Eliminar un mensaje
    public function destroyMensaje($id)
    {
        $mensaje = \App\Models\Mensaje::findOrFail($id);
        $mensaje->delete();

        return back()->with('success', "Mensaje #{$id} eliminado correctamente.");
    }
}