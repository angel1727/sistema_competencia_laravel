<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class conocimiento_tic extends Model
{
    protected $table = 'conocimiento_tic';
    protected $primaryKey = 'id_tic';
    public $timestamps = false;

    protected $fillable = [
        'herramienta_tecnologica',
        'nivel_conocimiento',
        'frecuencia_uso',
        'certificacion',
        'nombre_entidad_capacitacion',
        'fecha_tic',
        'id_postulante'
    ];

    public function postulante(){
        return $this->belongsTo(postulante::class, 'id_postulante', 'id_postulante');
    }
}
