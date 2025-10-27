<?php

namespace App\Models\ModelsP;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ExpTecnica extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * Guardar experiencia técnica según el tipo
     */
    public static function guardarExperiencia($tipo, $datos)
    {
        try {
            switch($tipo) {
                case 'ETISO_17025en':
                    return self::guardarLaboratorioEnsayo($datos);
                case 'ETISO_17025cal':
                    return self::guardarLaboratorioCalibracion($datos);
                case 'ETISO_15189':
                    return self::guardarLaboratorioClinico($datos);
                case 'ETISO_17043est':
                    return self::guardarProveedorEnsayoEtd($datos);
                case 'ETISO_17043tec':
                    return self::guardarProveedorEnsayoTec($datos);
                case 'ETISO_17020':
                    return self::guardarOrganismoInspeccion($datos);
                case 'ETISO_17065':
                    return self::guardarOrganismoProductos($datos);
                case 'ETISO_17021_1':
                    return self::guardarOrganismoSisGes($datos);
                case 'ETISO_17024':
                    return self::guardarCertificacionPersonas($datos);
                case 'ETISO_17034':
                    return self::guardarProveedorMateriales($datos);
                default:
                    throw new \Exception("Tipo de experiencia no válido");
            }
        } catch (\Exception $e) {
            Log::error("Error guardarExperiencia: " . $e->getMessage());
            return false;
        }
    }

    private static function guardarLaboratorioEnsayo($datos)
    {
        return DB::table('lab_ensayo_17025')->insert([
            'ensayo' => $datos['ensayo'],
            'tecnica_ens' => $datos['tecnica'],
            'norma_documento_ensayo' => $datos['norma_doc'],
            'item_ensayo_matriz' => $datos['item_ensayo'],
            'tiempo_exp_ensayo' => $datos['tiempo_exp'],
            'id_postulante' => $datos['id_postulante']
        ]);
    }

    private static function guardarLaboratorioCalibracion($datos)
    {
        return DB::table('lab_calibracion_17025')->insert([
            'magnitud' => $datos['magnitud'],
            'item_calibracion' => $datos['item_calibracion'],
            'norma_documento_calibracion' => $datos['norma_doc_cal'],
            'tiempo_exp_calibracion' => $datos['tiempo_exp_cal'],
            'id_postulante' => $datos['id_postulante']
        ]);
    }

    private static function guardarLaboratorioClinico($datos)
    {
        return DB::table('lab_clinico_15189')->insert([
            'area_campo' => $datos['area_campo'],
            'analisis_examen' => $datos['analisis_examen'],
            'tecnica_cli' => $datos['tecnica_cli'],
            'muestra_matriz' => $datos['muestra_matriz'],
            'tiempo_exp_clinico' => $datos['tiempo_exp_clinico'],
            'id_postulante' => $datos['id_postulante']
        ]);
    }

    private static function guardarProveedorEnsayoEtd($datos)
    {
        return DB::table('prov_aptitud_estadistico_17043')->insert([
            'nombre_ea_cil' => $datos['nombre_ea_cil'],
            'empresa_contratante' => $datos['empresa_contratante'],
            'software_utilizado' => $datos['software_utilizado'],
            'norma_aplicada' => $datos['norma_aplicada'],
            'tiempo_desarrollo_meses' => $datos['tiempo_desarrollo_meses'],
            'id_postulante' => $datos['id_postulante']
        ]);
    }

    private static function guardarProveedorEnsayoTec($datos)
    {
        return DB::table('prov_aptitud_tecnico_17043')->insert([
            'ensayo_magnitud' => $datos['ensayo_magnitud'],
            'tecnica_tec' => $datos['tecnica_tec'],
            'norma_documento_tecnico' => $datos['norma_documento_tecnico'],
            'item_muestra' => $datos['item_muestra'],
            'tiempo_exp_tecnico' => $datos['tiempo_exp_tecnico'],
            'id_postulante' => $datos['id_postulante']
        ]);
    }

    private static function guardarOrganismoInspeccion($datos)
    {
        return DB::table('org_inspeccion_17020')->insert([
            'campo_sector' => $datos['campo_sector'],
            'sub_sector' => $datos['sub_sector'],
            'item_inspeccionado' => $datos['item_inspeccionado'],
            'metodo_doc_normativo' => $datos['metodo_doc_normativo'],
            'tiempo_exp_inspeccion' => $datos['tiempo_exp_inspeccion'],
            'id_postulante' => $datos['id_postulante']
        ]);
    }

    private static function guardarOrganismoProductos($datos)
    {
        return DB::table('org_cert_productos_17065')->insert([
            'tipo_certificacion' => $datos['tipo_certificacion'],
            'producto_servicio' => $datos['producto_servicio'],
            'documento_normativo' => $datos['documento_normativo'],
            'division_nace' => $datos['division_nace'],
            'codigo_cpa' => $datos['codigo_cpa'],
            'tiempo_exp_producto' => $datos['tiempo_exp_producto'],
            'id_postulante' => $datos['id_postulante']
        ]);
    }

    private static function guardarOrganismoSisGes($datos)
    {
        return DB::table('org_cert_sist_gestion_17021_1')->insert([
            'sistema_gestion' => $datos['sistema_gestion'],
            'norma' => $datos['norma'],
            'codigo_iaf_sector' => $datos['codigo_iaf_sector'],
            'nombre_sector' => $datos['nombre_sector'],
            'tiempo_exp_sg' => $datos['tiempo_exp_sg'],
            'id_postulante' => $datos['id_postulante']
        ]);
    }

    private static function guardarCertificacionPersonas($datos)
    {
        return DB::table('certificacion_personas_17024')->insert([
            'sector_campo' => $datos['sector_campo'],
            'actividad_especifica' => $datos['actividad_especifica'],
            'item_matriz' => $datos['item_matriz'],
            'norma_documento_pers' => $datos['norma_documento_pers'],
            'tiempo_exp_pers' => $datos['tiempo_exp_pers'],
            'id_postulante' => $datos['id_postulante']
        ]);
    }

    private static function guardarProveedorMateriales($datos)
    {
        return DB::table('prov_material_ref_17034')->insert([
            'ensayo_mat' => $datos['ensayo_mat'],
            'tecnica_mat' => $datos['tecnica_mat'],
            'norma_documento_mat' => $datos['norma_documento_mat'],
            'item_ensayo_muestra' => $datos['item_ensayo_muestra'],
            'tiempo_exp_mat' => $datos['tiempo_exp_mat'],
            'id_postulante' => $datos['id_postulante']
        ]);
    }
}