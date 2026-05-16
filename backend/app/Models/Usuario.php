<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Model
{
    use HasApiTokens;
    protected $table = 'USUARIO';
    protected $primaryKey = 'idUsuario';

    protected $fillable = [
        'nombre',
        'apellidos',
        'correo',
        'contrasena',
        'foto_url',
        'tipo',
    ];

    protected $hidden = [
        'contrasena',
    ];

    public function rutinas()
    {
        return $this->hasMany(Rutina::class, 'idUsuario', 'idUsuario');
    }

    public function medidas()
    {
        return $this->hasMany(Medida::class, 'idUsuario', 'idUsuario');
    }
}
