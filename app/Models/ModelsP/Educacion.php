<?php

namespace App\Models\ModelsP;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Educacion extends Model
{
    use HasFactory;

    // No definimos $table ni $primaryKey ya que manejamos múltiples tablas
    public $timestamps = false;

    /**
     * Guardar educación formal en tabla 'educacion'
     */
    public static function guardarEducacionFormal($datos)
    {
        return DB::table('educacion')->insert([
            'nivel_academico' => $datos['nivel_academico'],
            'grado_obtenido' => $datos['grado_obtenido'] ?? null,
            'centro_educativo' => $datos['centro_educativo'] ?? null,
            'fecha_titulo' => $datos['fecha_titulo'] ?? null,
            'id_postulante' => $datos['id_postulante']
        ]);
    }

    /**
     * Guardar idioma en tabla 'idioma'
     */
    public static function guardarIdioma($datos)
    {
        return DB::table('idioma')->insert([
            'idioma' => $datos['idioma'],
            'nivel_escritura' => $datos['nivel_escritura'] ?? null,
            'nivel_oral' => $datos['nivel_oral'] ?? null,
            'nombre_curso' => $datos['nombre_curso'] ?? null,
            'entidad_emisora' => $datos['entidad_certificacion'] ?? null,
            'fecha_emision' => $datos['fecha_emision'] ?? null,
            'id_postulante' => $datos['id_postulante']
        ]);
    }

    /**
     * Guardar conocimiento TIC en tabla 'conocimiento_tic'
     */
    public static function guardarTic($datos)
    {
        return DB::table('conocimiento_tic')->insert([
            'herramienta_tecnologia' => $datos['herramienta_tecnologia'],
            'nivel_conocimiento' => $datos['nivel_conocimiento'] ?? null,
            'frecuencia_uso' => $datos['frecuencia_uso'] ?? null,
            'certificacion' => $datos['certificacion'] ?? null,
            'nombre_entidad_capacitacion' => $datos['nombre_entidad_capacitacion'] ?? null,
            'fecha_tic' => $datos['fecha_tic'] ?? null,
            'id_postulante' => $datos['id_postulante']
        ]);
    }

    /**
     * Obtener educación formal por postulante
     */
    public static function obtenerEducacionFormal($id_postulante)
    {
        return DB::table('educacion')
            ->where('id_postulante', $id_postulante)
            ->get();
    }

    /**
     * Obtener idiomas por postulante
     */
    public static function obtenerIdiomas($id_postulante)
    {
        return DB::table('idioma')
            ->where('id_postulante', $id_postulante)
            ->get();
    }

    /**
     * Obtener conocimientos TIC por postulante
     */
    public static function obtenerConocimientosTic($id_postulante)
    {
        return DB::table('conocimiento_tic')
            ->where('id_postulante', $id_postulante)
            ->get();
    }

    /**
     * Eliminar educación formal por postulante
     */
    public static function eliminarEducacionFormal($id_postulante)
    {
        return DB::table('educacion')
            ->where('id_postulante', $id_postulante)
            ->delete();
    }

    /**
     * Eliminar idiomas por postulante
     */
    public static function eliminarIdiomas($id_postulante)
    {
        return DB::table('idioma')
            ->where('id_postulante', $id_postulante)
            ->delete();
    }

    /**
     * Eliminar conocimientos TIC por postulante
     */
    public static function eliminarConocimientosTic($id_postulante)
    {
        return DB::table('conocimiento_tic')
            ->where('id_postulante', $id_postulante)
            ->delete();
    }
}