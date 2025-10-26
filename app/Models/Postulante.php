<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    use HasFactory;

    protected $table = 'postulante';
    protected $primaryKey = 'id_postulante'; // Especifica la llave primaria
    public $timestamps = false; // Desactiva los timestamps automáticos

    protected $fillable = [
        'nombres',
        'apellidos', 
        'cedula_identidad',
        'ciudad_residencia',
        'direccion_residencia',
        'nacionalidad',
        'correo',
        'telefono_movil',
        'telefono_fijo',
        'nit',
        'registro_sigep',
        'matricula_comercio',
        'seguro_salud',
        'seguro_riesgos'
        // fecha_registro se llenará automáticamente desde la BD
    ];
}