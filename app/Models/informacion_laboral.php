<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class informacion_laboral extends Model
{
    protected $table = 'informacion_laboral';
    protected $primaryKey = 'id_info_laboral';
    public $timestamps = false;

    protected $fillable = [
        'nombre_empresa',
        'direccion_empresa',
        'departamento_empresa',
        'telefono_empresa',
        'correo_empresa',
        'cargo_empresa',
        'tiempo_permanencia',
        'persona_referencia',
        'telefono_referencia',
        'descripcion_responsabilidades',
        'id_postulante'
    ];

    public function postulante()
    {
        return $this->belongsTo(postulante::class, 'id_postulante', 'id_postulante');
    }
}
