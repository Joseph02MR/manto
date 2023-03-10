<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_departamento',
        'id_maquina',
        'id_usuario',
        'no_serie',
        'modelo',
        'marca',
        'fecha_anual'
    ];
}
