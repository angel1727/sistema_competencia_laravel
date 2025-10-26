<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class prov_aptitud_estadistico_17043 extends Model
{
    protected $table = 'prov_aptitud_estadistico_17043';
    protected $primaryKey = 'id_prov_estadistico';
    public $timestamps = false;

    protected $fillable = [
        'nombre_ea_cil',
        'empresa_contratante',
        'software_utilizado',
        'norma_aplicada',
        'tiempo_desarrollo_meses',
        'id_postulante'
    ];

    public function postulante()
    {
        return $this->belongsTo(postulante::class, 'id_postulante', 'id_postulante');
    }
}
