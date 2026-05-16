<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EjercicioRutina extends Model
{
    protected $table = 'EJERCICIO_RUTINA';
    protected $primaryKey = 'idEjercicioRutina';

    protected $fillable = [
        'idRutina',
        'idEjercicio',
        'series',
        'repeticiones',
        'descanso',
    ];

    public function rutina()
    {
        return $this->belongsTo(Rutina::class, 'idRutina', 'idRutina');
    }

    public function ejercicio()
    {
        return $this->belongsTo(Ejercicio::class, 'idEjercicio', 'idEjercicio');
    }
}
