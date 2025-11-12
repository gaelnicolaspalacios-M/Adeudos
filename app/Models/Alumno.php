<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
     use HasFactory;

    protected $table ='periodos';

    protected $primaryKey ='periodo';
    protected $keyType ='string';


    protected $fillable = [
'no_de_control',
'carrera',
'especialidad',
'nivel_escolar',
'clave_interna',
'estatus_alumno',
'ACT',
'plan_de_estudios',
'apellido_paterno',
'apellido_materno',
'nombre_alumno',
'curp_alumno',
'sexo',
'estado_civil',
'tipo_servicio_medico',
'clave_servicio_medico',
'escuela_procedencia',
'domicilio_escuela',
'entidad_procedencia',
'ciudad_procedencia',
'correo_electronico',
'becado_por',
'tipo_alumno',
'nacionalidad',
'usuario',
'opcion_titulacion',
'estatus_alumno_usuario',
'estatus_alumno_anterior',
'periodo_titulacion'
    ];
}
