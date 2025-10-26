<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class idioma extends Model
{
    protected $table = 'idioma';
    protected $primaryKey = 'id_idioma';
    public $timestamps = false;

    protected $fillable = [
        'idioma',
        'nivel_escritura',
        'nivel_oral',
        'nombre_curso',
        'entidad_emisora',
        'fecha_emision',
        'id_postulante'
    ];

    public function postulante()
    {
        return $this->belongsTo(postulante::class, 'id_postulante', 'id_postulante');
    }
}
