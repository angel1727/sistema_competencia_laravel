<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class experiencia_eval_audi extends Model
{
    protected $table = 'experiencia_eval_audi';
    protected $primaryKey = 'id_exp_eval_audi';
    public $timestamps = false;

    protected $fillable = [
        'eval_audi',
        'organizacion_contratante',
        'organizacion_evaluada',
        'tipo_organismo',
        'rol_designado',
        'norma_aplicada',
        'fecha_eval_audi',
        'duracion_horas',
        'id_postulante'
    ];

    public function postulante()
    {
        return $this->belongsTo(postulante::class, 'id_postulante', 'id_postulante');
    }
}
