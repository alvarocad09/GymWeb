<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            MusculoSeeder::class,
            EjercicioSeeder::class,
            UsuarioSeeder::class,
            MedidaSeeder::class,
        ]);
    }
}
