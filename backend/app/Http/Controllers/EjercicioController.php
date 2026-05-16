<?php

namespace App\Http\Controllers;

use App\Models\Ejercicio;
use App\Models\Musculo;
use Illuminate\Http\Request;

class EjercicioController extends Controller
{
    // Lista todos los ejercicios con su músculo
    public function index()
    {
        $ejercicios = Ejercicio::with('musculo')->get();
        return response()->json($ejercicios);
    }

    // Crea un ejercicio nuevo
    public function store(Request $request)
    {
        $request->validate([
            'nombre'     => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'imagen_url' => 'nullable|string',
            'idMusculo'  => 'required|exists:MUSCULO,idMusculo',
        ]);

        $ejercicio = Ejercicio::create($request->all());
        return response()->json($ejercicio->load('musculo'), 201);
    }

    // Muestra un ejercicio concreto
    public function show(string $id)
    {
        $ejercicio = Ejercicio::with('musculo')->findOrFail($id);
        return response()->json($ejercicio);
    }

    // Actualiza un ejercicio
    public function update(Request $request, string $id)
    {
        $ejercicio = Ejercicio::findOrFail($id);
        $ejercicio->update($request->only([
            'nombre',
            'descripcion',
            'imagen_url',
            'idMusculo',
        ]));
        return response()->json($ejercicio->load('musculo'));
    }

    // Elimina un ejercicio
    public function destroy(string $id)
    {
        $ejercicio = Ejercicio::findOrFail($id);
        $ejercicio->delete();
        return response()->json(['message' => 'Ejercicio eliminado correctamente']);
    }

    // Lista todos los músculos (para los formularios de Angular)
    public function musculos()
    {
        $musculos = Musculo::all();
        return response()->json($musculos);
    }
}
