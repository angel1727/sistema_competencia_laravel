<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lab_calibracion_17025 extends Model
{
    protected $table = 'lab_calibracion_17025';
    protected $primaryKey = 'id_calibracion';
    public $timestamps = false;

    protected $fillable = [
        'magnitud',
        'item_calibracion',
        'norma_documento_calibracion',
        'tiempo_exp_calibracion',
        'id_postulante'
    ];

    public function postulante()
    {
        return $this->belongsTo(postulante::class, 'id_postulante', 'id_postulante');
    }
}
