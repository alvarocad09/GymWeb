<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ejercicio;
use App\Models\Musculo;

class EjercicioSeeder extends Seeder
{
    public function run(): void
    {
        $ejercicios = [
            // Pecho
            ['nombre' => 'Press de banca', 'descripcion' => 'Ejercicio básico de pecho con barra', 'musculo' => 'Pecho'],
            ['nombre' => 'Press inclinado', 'descripcion' => 'Press de banca en banco inclinado', 'musculo' => 'Pecho'],
            ['nombre' => 'Aperturas con mancuernas', 'descripcion' => 'Ejercicio de aislamiento de pecho', 'musculo' => 'Pecho'],
            ['nombre' => 'Flexiones', 'descripcion' => 'Ejercicio de pecho con peso corporal', 'musculo' => 'Pecho'],

            // Espalda
            ['nombre' => 'Dominadas', 'descripcion' => 'Ejercicio básico de espalda con peso corporal', 'musculo' => 'Espalda'],
            ['nombre' => 'Remo con barra', 'descripcion' => 'Ejercicio básico de espalda con barra', 'musculo' => 'Espalda'],
            ['nombre' => 'Jalón al pecho', 'descripcion' => 'Ejercicio de espalda en polea', 'musculo' => 'Espalda'],

            // Hombros
            ['nombre' => 'Press militar', 'descripcion' => 'Ejercicio básico de hombros con barra', 'musculo' => 'Hombros'],
            ['nombre' => 'Elevaciones laterales', 'descripcion' => 'Ejercicio de aislamiento de hombros', 'musculo' => 'Hombros'],
            ['nombre' => 'Face pull', 'descripcion' => 'Ejercicio de hombros en polea alta', 'musculo' => 'Hombros'],

            // Bíceps
            ['nombre' => 'Curl bayesian', 'descripcion' => 'Ejercicio de bíceps en polea baja', 'musculo' => 'Bíceps'],
            ['nombre' => 'Curl concentrado', 'descripcion' => 'Ejercicio de aislamiento de bíceps con mancuerna', 'musculo' => 'Bíceps'],
            ['nombre' => 'Curl con mancuernas', 'descripcion' => 'Ejercicio de bíceps con mancuernas', 'musculo' => 'Bíceps'],

            // Tríceps
            ['nombre' => 'Fondos en banco', 'descripcion' => 'Ejercicio de tríceps con peso corporal en banco', 'musculo' => 'Tríceps'],
            ['nombre' => 'Press francés', 'descripcion' => 'Ejercicio de tríceps con barra', 'musculo' => 'Tríceps'],
            ['nombre' => 'Extensión tras nuca', 'descripcion' => 'Ejercicio de tríceps con mancuerna tras la cabeza', 'musculo' => 'Tríceps'],
            ['nombre' => 'Extensión de tríceps', 'descripcion' => 'Ejercicio de tríceps en polea', 'musculo' => 'Tríceps'],

            // Abdominales
            ['nombre' => 'Plancha', 'descripcion' => 'Ejercicio isométrico de core', 'musculo' => 'Abdominales'],
            ['nombre' => 'Elevaciones de piernas', 'descripcion' => 'Ejercicio de abdominales inferiores', 'musculo' => 'Abdominales'],
            ['nombre' => 'Russian twist', 'descripcion' => 'Ejercicio de abdominales oblicuos', 'musculo' => 'Abdominales'],

            // Cuádriceps
            ['nombre' => 'Sentadilla', 'descripcion' => 'Ejercicio básico de pierna con barra', 'musculo' => 'Cuádriceps'],
            ['nombre' => 'Prensa de pierna', 'descripcion' => 'Ejercicio de cuádriceps en máquina', 'musculo' => 'Cuádriceps'],

            // Isquiotibiales
            ['nombre' => 'Peso muerto', 'descripcion' => 'Ejercicio básico de isquiotibiales con barra', 'musculo' => 'Isquiotibiales'],
            ['nombre' => 'Curl femoral', 'descripcion' => 'Ejercicio de isquiotibiales en máquina', 'musculo' => 'Isquiotibiales'],

            // Glúteos
            ['nombre' => 'Hip thrust', 'descripcion' => 'Ejercicio básico de glúteos con barra', 'musculo' => 'Glúteos'],
            ['nombre' => 'Sentadilla búlgara', 'descripcion' => 'Ejercicio de glúteos con mancuernas', 'musculo' => 'Glúteos'],

            // Gemelos
            ['nombre' => 'Elevación de talones de pie', 'descripcion' => 'Ejercicio básico de gemelos', 'musculo' => 'Gemelos'],
            ['nombre' => 'Elevación de talones sentado', 'descripcion' => 'Ejercicio de gemelos en máquina', 'musculo' => 'Gemelos'],
        ];

        foreach ($ejercicios as $datos) {
            $musculo = Musculo::where('nombre', $datos['musculo'])->first();
            Ejercicio::create([
                'nombre'      => $datos['nombre'],
                'descripcion' => $datos['descripcion'],
                'imagen_url'  => null,
                'idMusculo'   => $musculo->idMusculo,
            ]);
        }
    }
}
