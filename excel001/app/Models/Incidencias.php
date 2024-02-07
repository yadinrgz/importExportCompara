<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencias extends Model
{
    use HasFactory;
    protected $fillable = [
        'numemp_in',
        'clave_hor',
        'horario',
        'fecha_ini',
        'fecha_fin',
        'incidencia',
        'detalle_hor',
        'reg_entrada',
        'reg_salida',
        'horas_trabajadas',
        'observaciones',
    ];
}