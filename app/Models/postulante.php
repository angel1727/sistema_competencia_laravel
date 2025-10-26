<?php

namespace App\Models;
use App\Http\Controllers\admin\PostulantesController;


use Illuminate\Database\Eloquent\Model;

class postulante extends Model
{
    protected $table = 'postulante';
    protected $primaryKey = 'id_postulante';
    public $timestamps = true;

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
        'seguro_riesgos',
        'created_at'

    ];

    public function educaciones()
    {
        return $this->hasMany(educacion::class, 'id_postulante', 'id_postulante');
    }
}
