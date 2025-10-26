<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class capacitacion_formacion extends Model
{
    protected $table = 'capacitacion_formacion';
    protected $primaryKey = 'id_capacitacion';
    public $timestamps = false;

    protected $fillable = [
        'esquema_capac',
        'tipo_capac',
        'tema_capac',
        'organismo_capac',
        'fecha_capac',
        'duracion_horas_capac',
        'id_postulante'
    ];
    public function postulante()
    {
        return $this->belongsTo(postulante::class, 'id_postulante', 'id_postulante');
    }
}
