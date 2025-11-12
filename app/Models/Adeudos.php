<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adeudos extends Model
{
    use HasFactory;

    protected $table = 'adeudos';

    protected $fillable = [
        'no_de_control',
        'tipo',
        'periodo',
        'laboratorio',
        'costo',
        'fecha',
        'descripcion',
        'clave_area'
    ];

    protected $casts = [
        'fecha' => 'date'
    ];

}
