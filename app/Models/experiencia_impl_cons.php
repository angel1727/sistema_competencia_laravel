<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class experiencia_impl_cons extends Model
{
    protected $table = 'experiencia_impl_cons';
    protected $primaryKey = 'id_exp_impl_cons';
    public $timestamps = false;

    protected $fillable = [
        'organizacion_servicio',
        'organizacion_beneficiada',
        'funcion_impl',
        'fecha_impl',
        'duracion_horas_impl',
        'id_postulante'
    ];

    public function postulante()
    {
        return $this->belongsTo(postulante::class, 'id_postulante', 'id_postulante');
    }
}
