<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lab_ensayo_17025 extends Model
{
    protected $table = 'lab_ensayo_17025';
    protected $primaryKey = 'id_ensayo';
    public $timestamps = false;

    protected $fillable = [
        'ensayo',
        'tecnica_ens',
        'norma_documento_ensayo',
        'item_ensayo_matriz',
        'tiempo_exp_ensayo',
        'id_postulante'
    ];

    public function postulante()
    {
        return $this->belongsTo(postulante::class, 'id_postulante', 'id_postulante');
    }
}
