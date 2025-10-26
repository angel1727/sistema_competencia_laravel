<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class org_inspeccion_17020 extends Model
{
    protected $table = 'org_inspeccion_17020';
    protected $primaryKey = 'id_inspeccion';
    public $timestamps = false;

    protected $fillable = [
        'campo_sector',
        'sub_sector',
        'item_inspeccionado',
        'metodo_doc_normativo',
        'tiempo_exp_inspeccion',
        'id_postulante'
    ];

    public function postulante()
    {
        return $this->belongsTo(postulante::class, 'id_postulante', 'id_postulante');
    }
}
