<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medida;
use App\Models\Usuario;

class MedidaSeeder extends Seeder
{
    public function run(): void
    {
        $medidas = [
            ['nombre' => 'Peso', 'valor' => 0],
            ['nombre' => '% de grasa', 'valor' => 0],
            ['nombre' => 'Diámetro de cintura', 'valor' => 0],
        ];

        // Insertamos las medidas por defecto para cada usuario
        $usuarios = Usuario::all();

        foreach ($usuarios as $usuario) {
            foreach ($medidas as $medida) {
                Medida::create([
                    'nombre'    => $medida['nombre'],
                    'valor'     => $medida['valor'],
                    'fecha'     => now(),
                    'idUsuario' => $usuario->idUsuario,
                ]);
            }
        }
    }
}
