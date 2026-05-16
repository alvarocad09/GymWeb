<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    protected $table = 'MEDIDA';
    protected $primaryKey = 'idMedida';

    protected $fillable = [
        'fecha',
        'nombre',
        'valor',
        'idUsuario',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario', 'idUsuario');
    }
}
