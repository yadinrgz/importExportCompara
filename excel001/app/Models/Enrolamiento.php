<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrolamiento extends Model
{
    use HasFactory;
protected $fillable = [
    'numbemp_bio',
    'name_bio',
    'rostro_bio',
];
}
