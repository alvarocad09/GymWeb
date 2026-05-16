<?php

namespace App\Http\Controllers;

use App\Models\Medida;
use Illuminate\Http\Request;

class MedidaController extends Controller
{
    // Lista todas las medidas del usuario autenticado
    public function index(Request $request)
    {
        $medidas = Medida::where('idUsuario', $request->user()->idUsuario)
            ->orderBy('fecha', 'desc')
            ->get();

        return response()->json($medidas);
    }

    // Crea una medida nueva
    public function store(Request $request)
    {
        $request->validate([
            'fecha'  => 'required|date',
            'nombre' => 'required|string|max:100',
            'valor'  => 'required|numeric',
        ]);

        $medida = Medida::create([
            'fecha'     => $request->fecha,
            'nombre'    => $request->nombre,
            'valor'     => $request->valor,
            'idUsuario' => $request->user()->idUsuario,
        ]);

        return response()->json($medida, 201);
    }

    // Muestra una medida concreta
    public function show(Request $request, string $id)
    {
        $medida = Medida::where('idMedida', $id)
            ->where('idUsuario', $request->user()->idUsuario)
            ->firstOrFail();

        return response()->json($medida);
    }

    // Actualiza una medida
    public function update(Request $request, string $id)
    {
        $medida = Medida::where('idMedida', $id)
            ->where('idUsuario', $request->user()->idUsuario)
            ->firstOrFail();

        $medida->update($request->only(['fecha', 'nombre', 'valor']));

        return response()->json($medida);
    }

    // Elimina una medida
    public function destroy(Request $request, string $id)
    {
        $medida = Medida::where('idMedida', $id)
            ->where('idUsuario', $request->user()->idUsuario)
            ->firstOrFail();

        $medida->delete();

        return response()->json(['message' => 'Medida eliminada correctamente']);
    }

    // Lista las medidas de todos los usuarios (solo admin)
    public function indexAdmin()
    {
        $medidas = Medida::with('usuario')
            ->orderBy('fecha', 'desc')
            ->get();

        return response()->json($medidas);
    }
}
