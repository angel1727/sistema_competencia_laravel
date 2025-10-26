<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class certificacion_personas_17024 extends Model
{
    protected $table = 'certificacion_personas_17024';
    protected $primaryKey = 'id_cert_persona';
    public $timestamps = false;

    protected $fillable = [
        'sector_campo',
        'actividad_especifica',
        'item_matriz',
        'norma_documento_pers',
        'tiempo_exp_pers',
        'id_postulante'
    ];

    public function postulante()
    {
        return $this->belongsTo(postulante::class, 'id_postulante', 'id_postulante');
    }
}
