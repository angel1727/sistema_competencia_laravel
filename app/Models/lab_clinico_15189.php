<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lab_clinico_15189 extends Model
{
    protected $table = 'lab_clinico_15189';
    protected $primaryKey = 'id_clinico';
    public $timestamps = false;

    protected $fillable = [
        'area_campo',
        'analisis_examen',
        'tecnica_cli',
        'muestra_matriz',
        'tiempo_exp_clinico',
        'id_postulante'
    ];

    public function postulante()
    {
        return $this->belongsTo(postulante::class, 'id_postulante', 'id_postulante');
    }
}
