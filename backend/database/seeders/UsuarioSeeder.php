<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        // Administrador
        Usuario::create([
            'nombre'     => 'Admin',
            'apellidos'  => 'GymWeb',
            'correo'     => 'admin@gymweb.com',
            'contrasena' => Hash::make('admin1234'),
            'tipo'       => 1,
        ]);

        // Usuario de prueba
        Usuario::create([
            'nombre'     => 'Usuario',
            'apellidos'  => 'Prueba',
            'correo'     => 'usuario@gymweb.com',
            'contrasena' => Hash::make('usuario1234'),
            'tipo'       => 0,
        ]);
    }
}
