<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Musculo extends Model
{
    protected $table = 'MUSCULO';
    protected $primaryKey = 'idMusculo';

    protected $fillable = [
        'nombre',
    ];

    public function ejercicios()
    {
        return $this->hasMany(Ejercicio::class, 'idMusculo', 'idMusculo');
    }
}
