<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class prov_aptitud_tecnico_17043 extends Model
{
    protected $table = 'prov_aptitud_tecnico_17043';
    protected $primaryKey = 'id_prov_tecnico';
    public $timestamps = false;

    protected $fillable = [
        'ensayo_magnitud',
        'tecnica_tec',
        'norma_documento_tecnico',
        'item_muestra',
        'tiempo_exp_tecnico',
        'id_postulante'
    ];

    public function postulante()
    {
        return $this->belongsTo(postulante::class, 'id_postulante', 'id_postulante');
    }
}
