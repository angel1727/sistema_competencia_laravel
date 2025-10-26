<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class org_cert_sist_gestion_17021_1 extends Model
{
    protected $table = 'org_cert_sist_gestion_17021_1';
    protected $primaryKey = 'id_sg';
    public $timestamps = false;

    protected $fillable = [
        'sistema_gestion',
        'norma',
        'codigo_iaf_sector',
        'nombre_sector',
        'tiempo_exp_sg',
        'id_postulante'
    ];

    public function postulante()
    {
        return $this->belongsTo(postulante::class, 'id_postulante', 'id_postulante');
    }
}
