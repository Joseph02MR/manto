<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_mant extends Model
{
    use HasFactory;
    
    protected $hidden = [
        'tipo',
        'id_tipo',
    ];
}
