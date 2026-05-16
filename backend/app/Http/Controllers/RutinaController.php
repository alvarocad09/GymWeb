<?php

namespace App\Http\Controllers;

use App\Models\Rutina;
use App\Models\EjercicioRutina;
use Illuminate\Http\Request;

class RutinaController extends Controller
{
    public function index(Request $request)
    {
        $rutinas = Rutina::where('idUsuario', $request->user()->idUsuario)
            ->with('ejercicios.ejercicio.musculo')
            ->get();

        return response()->json($rutinas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'      => 'nullable|string|max:50',
            'fecha'       => 'nullable|date',
            'ejercicios'  => 'nullable|array',
            'ejercicios.*.idEjercicio'   => 'required|exists:EJERCICIO,idEjercicio',
            'ejercicios.*.series'        => 'required|integer',
            'ejercicios.*.repeticiones'  => 'required|integer',
            'ejercicios.*.descanso'      => 'required|integer',
        ]);

        $rutina = Rutina::create([
            'nombre'    => $request->nombre,
            'fecha'     => $request->fecha,
            'idUsuario' => $request->user()->idUsuario,
        ]);

        if ($request->ejercicios) {
            foreach ($request->ejercicios as $ejercicio) {
                EjercicioRutina::create([
                    'idRutina'     => $rutina->idRutina,
                    'idEjercicio'  => $ejercicio['idEjercicio'],
                    'series'       => $ejercicio['series'],
                    'repeticiones' => $ejercicio['repeticiones'],
                    'descanso'     => $ejercicio['descanso'],
                ]);
            }
        }

        return response()->json($rutina->load('ejercicios.ejercicio.musculo'), 201);
    }

    public function show(Request $request, string $id)
    {
        $rutina = Rutina::where('idRutina', $id)
            ->where('idUsuario', $request->user()->idUsuario)
            ->with('ejercicios.ejercicio.musculo')
            ->firstOrFail();

        return response()->json($rutina);
    }

    public function update(Request $request, string $id)
    {
        $rutina = Rutina::where('idRutina', $id)
            ->where('idUsuario', $request->user()->idUsuario)
            ->firstOrFail();

        $rutina->update($request->only(['nombre', 'fecha']));

        if ($request->ejercicios) {
            EjercicioRutina::where('idRutina', $rutina->idRutina)->delete();

            foreach ($request->ejercicios as $ejercicio) {
                EjercicioRutina::create([
                    'idRutina'     => $rutina->idRutina,
                    'idEjercicio'  => $ejercicio['idEjercicio'],
                    'series'       => $ejercicio['series'],
                    'repeticiones' => $ejercicio['repeticiones'],
                    'descanso'     => $ejercicio['descanso'],
                ]);
            }
        }

        return response()->json($rutina->load('ejercicios.ejercicio.musculo'));
    }

    public function destroy(Request $request, string $id)
    {
        $rutina = Rutina::where('idRutina', $id)
            ->where('idUsuario', $request->user()->idUsuario)
            ->firstOrFail();

        $rutina->delete();

        return response()->json(['message' => 'Rutina eliminada correctamente']);
    }

    // Lista las rutinas de todos los usuarios (solo admin)
    public function indexAdmin()
    {
        $rutinas = Rutina::with(['ejercicios.ejercicio.musculo', 'usuario'])
            ->get();

        return response()->json($rutinas);
    }
}
