<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class educacion extends Model
{
    protected $table = 'educacion';
    protected $primaryKey = 'id_educacion';
    public $timestamps = false;

    protected $fillable = [
        'nivel_academico',
        'grado_obtenido',
        'centro_educativo',
        'fecha_titulo',
        'id_postulante'
    ];

    public function postulante()
    {
        return $this->belongsTo(postulante::class, 'id_postulante', 'id_postulante');
    }
}
