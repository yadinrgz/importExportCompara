<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emplingresio extends Model
{
    use HasFactory;
    protected $fillable = [
        'empnumber_ingsio',
        'name_ingsio',
    ];
}




