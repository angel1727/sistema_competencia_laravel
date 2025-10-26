<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class org_cert_productos_17065 extends Model
{
    protected $table = 'org_cert_productos_17065';
    protected $primaryKey = 'id_productos';
    public $timestamps = false;

    protected $fillable = [
        'tipo_certificacion',
        'producto_servicio',
        'documento_normativo',
        'division_nace',
        'codigo_cpa',
        'tiempo_exp_productos',
        'id_postulante'
    ];

    public function postulante()
    {
        return $this->belongsTo(postulante::class, 'id_postulante', 'id_postulante');
    }
}
