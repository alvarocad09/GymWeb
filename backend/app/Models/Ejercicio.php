<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    protected $table = 'EJERCICIO';
    protected $primaryKey = 'idEjercicio';

    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen_url',
        'idMusculo',
    ];

    public function musculo()
    {
        return $this->belongsTo(Musculo::class, 'idMusculo', 'idMusculo');
    }

    public function rutinas()
    {
        return $this->hasMany(EjercicioRutina::class, 'idEjercicio', 'idEjercicio');
    }
}
