<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rutina extends Model
{
    protected $table = 'RUTINA';
    protected $primaryKey = 'idRutina';

    protected $fillable = [
        'nombre',
        'fecha',
        'idUsuario',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario', 'idUsuario');
    }

    public function ejercicios()
    {
        return $this->hasMany(EjercicioRutina::class, 'idRutina', 'idRutina');
    }
}
