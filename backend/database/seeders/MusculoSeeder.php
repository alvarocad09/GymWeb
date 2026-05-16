<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Musculo;

class MusculoSeeder extends Seeder
{
    public function run(): void
    {
        $musculos = [
            'Pecho',
            'Espalda',
            'Hombros',
            'Bíceps',
            'Tríceps',
            'Abdominales',
            'Cuádriceps',
            'Isquiotibiales',
            'Glúteos',
            'Gemelos',
        ];

        foreach ($musculos as $nombre) {
            Musculo::create(['nombre' => $nombre]);
        }
    }
}
