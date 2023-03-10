<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'id_tipo',
        'id_maquina',
        'pieza',
        'materiales',
        'fecha_mant',
        'id_mantenimiento'
    ];
}
