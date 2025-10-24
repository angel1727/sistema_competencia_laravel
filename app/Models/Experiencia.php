<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Experiencia extends Model
{
    use HasFactory;

    // No definimos $table ni $primaryKey ya que manejamos múltiples tablas
    public $timestamps = false;

    /**
     * Guardar información laboral actual en tabla 'infolaboral'
     */
    public static function guardarEmpresaActual($datos)
    {
        $empresaExistente = DB::table('informacion_laboral')
            ->where('id_postulante', $datos['id_postulante'])
            ->first();

        $data = [
            'nombre_empresa' => $datos['empresa'],
            'direccion_empresa' => $datos['empresa_direccion'] ?? null,
            'departamento_empresa' => $datos['departamento'] ?? null,
            'telefono_empresa' => $datos['empresa_telefono'] ?? null,
            'correo_empresa' => $datos['empresa_correo'] ?? null,
            'cargo_empresa' => $datos['cargo'] ?? null,
            'tiempo_permanencia' => $datos['tiempo_permanencia'] ?? null,
            'persona_referencia' => $datos['persona_referencia'] ?? null,
            'telefono_referencia' => $datos['telefono_referencia'] ?? null,
            'descripcion_responsabilidades' => $datos['descripcion_responsabilidades'] ?? null,
        ];

        if ($empresaExistente) {
            // Actualiza el registro existente
            return DB::table('informacion_laboral')
                ->where('id_postulante', $datos['id_postulante'])
                ->update($data);
        } else {
            // Inserta nuevo si no existe
            $data['id_postulante'] = $datos['id_postulante'];
            return DB::table('informacion_laboral')->insert($data);
        }
    }


    /**
     * Guardar experiencia laboral en tabla 'experiencialaboral'
     */
    public static function guardarExperienciaLaboral($datos)
    {
        return DB::table('experiencia_laboral')->insert([
            'empresa' => $datos['empresai'],
            'tipo_organizacion' => $datos['tipo_organizacion'] ?? null,
            'cargo' => $datos['cargo_desempenado'] ?? null,
            'descripcion_actividades' => $datos['descripcion_actividades'] ?? null,
            'fecha_desde_exp' => !empty($datos['fecha_desde']) ? date('Y-m-d', strtotime($datos['fecha_desde'])) : null,
            'fecha_hasta_exp' => !empty($datos['fecha_hasta']) ? date('Y-m-d', strtotime($datos['fecha_hasta'])) : null,
            'duracion_meses_exp' => $datos['duracion_meses'] ?? null,
            'id_postulante' => $datos['id_postulante']
        ]);
    }

    /**
     * Guardar auditorías en tabla 'experienciaaudiriaud'
     */
    public static function guardarAuditorias($datos)
    {
        return DB::table('experiencia_eval_audi')->insert([
            'eval_audi' => $datos['area'] ?? null,
            'organizacion_contratante' => $datos['organizacion_servicio'] ?? null,
            'organizacion_evaluada' => $datos['organizacion_evaluada'] ?? null,
            'tipo_organismo' => $datos['tipo_organismo'] ?? null,
            'rol_designado' => $datos['rol_designado'] ?? null,
            'norma_aplicada' => $datos['norma_aplicada'] ?? null,
            'fecha_eval_audi' => !empty($datos['fecha']) ? date('Y-m-d', strtotime($datos['fecha'])) : null,
            'duracion_horas' => $datos['duracion_horas'] ?? null,
            'id_postulante' => $datos['id_postulante']
        ]);
    }

    /**
     * Guardar consultorías en tabla 'experienciaimpementacion'
     */
    public static function guardarConsultorias($datos)
    {
        return DB::table('experiencia_impl_cons')->insert([
            'organizacion_servicio' => $datos['organizacion_servicio_consul'] ?? null,
            'organizacion_beneficiada' => $datos['organizacion_beneficiada'] ?? null,
            'funcion_impl' => $datos['funcion'] ?? null,
            'fecha_impl' => !empty($datos['fecha_consul']) ? date('Y-m-d', strtotime($datos['fecha_consul'])) : null,
            'duracion_horas_impl' => $datos['duracion_horas_consul'] ?? null,
            'id_postulante' => $datos['id_postulante']
        ]);
    }

    /**
     * Obtener información laboral actual por postulante
     */
    public static function obtenerEmpresaActual($id_postulante)
    {
        return DB::table('informacion_laboral')
            ->where('id_postulante', $id_postulante)
            ->first();
    }

    /**
     * Obtener experiencias laborales por postulante
     */
    public static function obtenerExperienciasLaborales($id_postulante)
    {
        return DB::table('experiencia_laboral')
            ->where('id_postulante', $id_postulante)
            ->get();
    }

    /**
     * Obtener auditorías por postulante
     */
    public static function obtenerAuditorias($id_postulante)
    {
        return DB::table('experiencia_eval_audi')
            ->where('id_postulante', $id_postulante)
            ->get();
    }

    /**
     * Obtener consultorías por postulante
     */
    public static function obtenerConsultorias($id_postulante)
    {
        return DB::table('experiencia_impl_cons')
            ->where('id_postulante', $id_postulante)
            ->get();
    }

    /**
     * Eliminar información laboral por postulante
     */
    public static function eliminarEmpresaActual($id_postulante)
    {
        return DB::table('informacion_laboral')
            ->where('id_postulante', $id_postulante)
            ->delete();
    }

    /**
     * Eliminar experiencias laborales por postulante
     */
    public static function eliminarExperienciasLaborales($id_postulante)
    {
        return DB::table('experiencia_laboral')
            ->where('id_postulante', $id_postulante)
            ->delete();
    }

    /**
     * Eliminar auditorías por postulante
     */
    public static function eliminarAuditorias($id_postulante)
    {
        return DB::table('experiencia_eval_audi')
            ->where('id_postulante', $id_postulante)
            ->delete();
    }

    /**
     * Eliminar consultorías por postulante
     */
    public static function eliminarConsultorias($id_postulante)
    {
        return DB::table('experiencia_impl_cons')
            ->where('id_postulante', $id_postulante)
            ->delete();
    }
}
