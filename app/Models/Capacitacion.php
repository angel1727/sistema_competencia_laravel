<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log; // <-- AÑADIR ESTA LÍNEA
use PDOException;

class Capacitacion extends Model
{
    use HasFactory;

    // No definimos $table ya que manejamos la tabla directamente
    public $timestamps = false;

    /**
     * Guardar múltiples capacitaciones en tabla 'capacitacionformacion'
     * Siguiendo el mismo patrón que el modelo Educacion
     */
    public static function guardarMultiplesCapacitaciones($registros)
    {
        try {
            DB::beginTransaction();
            
            foreach ($registros as $registro) {
                DB::table('capacitacion_formacion')->insert([
                    'esquema_capac' => $registro['area'],
                    'tipo_capac' => $registro['tipo_capacitacion'] ?? null,
                    'tema_capac' => $registro['tema_capacitacion'] ?? null,
                    'organismo_capac' => $registro['organismo_capacitacion'] ?? null,
                    'fecha_capac' => $registro['fecha_capacitacion'] ?? null,
                    'duracion_horas_capac' => $registro['duracion_horas_capacitacion'] ?? 0,
                    'id_postulante' => $registro['id_postulante']
                ]);
            }
            
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Error al guardar capacitaciones: " . $e->getMessage()); // <-- CORREGIDO
            return false;
        }
    }

    /**
     * Obtener capacitaciones por postulante (si necesitas esta función)
     */
    public static function obtenerPorPostulante($id_Postulante)
    {
        return DB::table('capacitacion_formacion')
            ->where('id_postulante', $id_Postulante)
            ->get();
    }

    /**
     * Eliminar capacitaciones por postulante (si necesitas esta función)
     */
    public static function eliminarPorPostulante($id_Postulante)
    {
        return DB::table('capacitacion_formacion')
            ->where('id_postulante', $id_Postulante)
            ->delete();
    }
}