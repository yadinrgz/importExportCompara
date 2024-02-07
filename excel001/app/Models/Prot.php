<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prot extends Model
{
    use HasFactory;
    protected $fillable = [
        'clave',
        'lector',
        'nombre_lector',
        'serie',
        'host',
        'ip',
        'terminal',
        'puerto',
    ];
}