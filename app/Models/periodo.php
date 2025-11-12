<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class periodo extends Model
{
         use HasFactory;

    protected $table ='alumnos';

    protected $primaryKey ='no_de_control';
    protected $keyType ='char';


    protected $fillable = [
'periodo',
'identificacion_larga',
'identificacion_corta',
'fecha_inicio',
'fecha_termino',
'inicio_vacacional_ss',
'termino_vacacional_ss',
'num_dias_clase',
'inicio_especial',
'fin_especial',
'cierre_horarios',
'cierre_seleccion',
'inicio_enc_estudiantil',
'fin_enc_estudiantil',
'inicio_sele_alumnos',
'fin_sele_alumnos',
'inicio_vacacional',
'termino_vacacional',
'parcial1_inicio',
'parcial1_fin',
'parcial2_inicio',
'parcial2_fin',
'parcial3_inicio',
'parcial3_fin',
'filtro',
'nota_resp',
'nota',
'inicio_cal_docentes',
'fin_cal_docentes'

    ];
}
