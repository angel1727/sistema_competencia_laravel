<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class experiencia_laboral extends Model
{
    protected $table = 'experiencia_laboral';
    protected $primaryKey = 'id_exp_laboral';
    public $timestamps = false;

    protected $fillable = [
        'empresa',
        'tipo_organizacion',
        'cargo',
        'descripcion_actividades',
        'fecha_desde_exp',
        'fecha_hasta_exp',
        'duracion_meses_exp',
        'id_postulante'
    ];

    public function postulante()
    {
        return $this->belongsTo(postulante::class, 'id_postulante', 'id_postulante');
    }

}
