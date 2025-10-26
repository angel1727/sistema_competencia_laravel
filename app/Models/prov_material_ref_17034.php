<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class prov_material_ref_17034 extends Model
{
    protected $table = 'prov_material_ref_17034';
    protected $primaryKey = 'id_prov_material';
    public $timestamps = false;

    protected $fillable = [
        'ensayo_mat',
        'tecnica_mat',
        'norma_documento_mat',
        'item_ensayo_muestra',
        'tiempo_exp_mat',
        'id_postulante'
    ];

    public function postulante()
    {
        return $this->belongsTo(postulante::class, 'id_postulante', 'id_postulante');
    }
}
