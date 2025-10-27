<?php

namespace App\Http\Controllers\ControllersP;

use App\Models\ModelsP\ExpTecnica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ExpTecnicaController extends Controller
{
    /**
     * Mostrar formulario de experiencia técnica
     */
    public function mostrarFormulario()
    {
        return view('formulario-completo');
    }

    /**
     * Guardar experiencia técnica (con validaciones dinámicas)
     */
    public function guardarExperiencia(Request $request)
    {
        if (!Session::has('id_postulante')) {
            return redirect()->route('postulante.formulario')
                ->with('error', 'Primero debe completar sus datos personales');
        }

        $id_postulante = Session::get('id_postulante');
        $guardadoExitoso = true;

        // 🔹 1. Reglas generales
        $rules = [
            'experiencia' => 'required|array|min:1',
            'experiencia.*.area' => 'required|string',
        ];

        $messages = [
            'experiencia.required' => 'Debe registrar al menos una experiencia técnica.',
            'experiencia.*.area.required' => 'Debe seleccionar un esquema ISO/IEC en cada bloque.',

            /* Reglas para ETISO_17025en */
            'experiencia.*.subformularios.*.ensayo.regex' => 'El campo Ensayo solo puede contener letras y (- , . /).',
            'experiencia.*.subformularios.*.tecnica.regex' => 'El campo Tecnica solo puede contener letras y (- , . /).',
            'experiencia.*.subformularios.*.norma_doc.regex' => 'El campo Norma doc solo puede contener letras, números y (- , . /).',
            'experiencia.*.subformularios.*.item_ensayo.regex' => 'El campo Item de Ensayo solo puede contener letras, números y (- / ; , .).',
            'experiencia.*.subformularios.*.tiempo_exp.min' => 'El tiempo de experiencia debe ser de al menos 2 años.',

            /* Reglas para ETISO_17025cal */
            'experiencia.*.subformularios.*.magnitud.regex' => 'El campo Magnitud solo puede contener letras,(- / , .).',
            'experiencia.*.subformularios.*.item_calibracion.regex' => 'El campo Item Calibracion solo puede contener letras, números y (- , . / () - ).',
            'experiencia.*.subformularios.*.norma_doc_cal.regex' => 'El campo Norma Doc solo puede contener letras, números y (- , . / () - ).',
            'experiencia.*.subformularios.*.tiempo_exp_cal.min' => 'El tiempo de experiencia debe ser de al menos 2 años.',

            /* Reglas para ETISO_15189 */
            'experiencia.*.subformularios.*.area_campo.regex' => 'El campo Area/Campo solo puede contener letras,(- / , .).',
            'experiencia.*.subformularios.*.analisis_examen.regex' => 'El campo Analisis/Examen solo puede contener letras, números y (- , . / () - ).',
            'experiencia.*.subformularios.*.tecnica_cli.regex' => 'El campo Tecnica solo puede contener letras, números y (- , . / () - ).',
            'experiencia.*.subformularios.*.tiempo_exp_clinico.min' => 'El tiempo de experiencia debe ser de al menos 2 años.',

            /* Reglas para ETISO_17043est */
            'experiencia.*.subformularios.*.nombre_ea_cil.regex' => 'El campo Nombre EA/CIL solo puede contener letras, números y (- , . /).',
            'experiencia.*.subformularios.*.empresa_contratante.regex' => 'El campo Empresa Contratante solo puede contener letras, números y (- , . /).',
            'experiencia.*.subformularios.*.software_utilizado.regex' => 'El campo Software solo puede contener letras, números y (- , . /).',
            'experiencia.*.subformularios.*.norma_aplicada.regex' => 'El campo Norma Apli. solo puede contener letras, números y (- , . / () - ).',
            'experiencia.*.subformularios.*.tiempo_desarrollo_meses.min' => 'El tiempo de desarrollo debe ser de al menos 1 meses.',

            /* Reglas para ETISO_17043tec */
            'experiencia.*.subformularios.*.ensayo_magnitud.regex' => 'El campo Ensayo/Magnitud solo puede contener letras, números y (- , . /).',
            'experiencia.*.subformularios.*.tecnica_tec.regex' => 'El campo Tecnica solo puede contener letras, números y (- , . /).',
            'experiencia.*.subformularios.*.norma_documento_tecnico.regex' => 'El campo Norma/Doc. solo puede contener letras, números y (- , . /).',
            'experiencia.*.subformularios.*.item_muestra.regex' => 'El campo Item Ensayo/Muestra solo puede contener letras, números y (- , . /).',
            'experiencia.*.subformularios.*.tiempo_exp_tecnico.min' => 'El tiempo de experiencia debe ser de al menos de 2 años.',

            /* Reglas para ETISO_17020 */
            'experiencia.*.subformularios.*.campo_sector.regex' => 'El Campo Sector solo puede contener letras, números y (- , . /).',
            'experiencia.*.subformularios.*.sub_sector.regex' => 'El campo Sub Sector solo puede contener letras, números y (- , . /).',
            'experiencia.*.subformularios.*.item_inspeccionado.regex' => 'El campo Item Inspeccionado solo puede contener letras, números y (- , . / () - ).',
            'experiencia.*.subformularios.*.metodo_doc_normativo.regex' => 'El campo Metodo/Doc Norma. solo puede contener letras, números y (- , . / () - ).',
            'experiencia.*.subformularios.*.tiempo_exp_inspeccion.min' => 'El tiempo de experiencia debe ser de al menos de 2 años.',

            /* Reglas para ETISO_17065 */
            'experiencia.*.subformularios.*.tipo_certificacion.regex' => 'El campo Tipo Certificacion solo puede contener letras, números y (- , . /).',
            'experiencia.*.subformularios.*.producto_servicio.regex' => 'El campo Producto Servicio solo puede contener letras, números y (- , . /).',
            'experiencia.*.subformularios.*.documento_normativo.regex' => 'El campo Documento Normatico solo puede contener letras, números y (- , . /).',
            'experiencia.*.subformularios.*.division_nace.regex' => 'El campo Division Nace solo puede contener letras, números y (- , . /).',
            'experiencia.*.subformularios.*.codigo_cpa.regex' => 'El campo Codigo CPA solo puede contener letras, números y (- , . /).',
            'experiencia.*.subformularios.*.tiempo_exp_producto.min' => 'El tiempo de experiencia debe ser de al menos de 2 años.',

            /* Reglas para ETISO_17021_1 */
            'experiencia.*.subformularios.*.sistema_gestion.regex' => 'El campo Sistema Gestion solo puede contener letras y (- , . /).',
            'experiencia.*.subformularios.*.norma.regex' => 'El campo Norma solo puede contener letras, números y (- , . /).',
            'experiencia.*.subformularios.*.codigo_iaf_sector.regex' => 'El campo Codigo IAF-Sector solo puede contener letras, números y (- , . /).',
            'experiencia.*.subformularios.*.nombre_sector.regex' => 'El campo Nombre Sector solo puede contener letras y (- , . /).',
            'experiencia.*.subformularios.*.tiempo_exp_sg.min' => 'El tiempo de experiencia debe ser de al menos de 2 años.',

            /* Reglas para ETISO_17024 */
            'experiencia.*.subformularios.*.sector_campo.regex' => 'El campo Sector/Campo solo puede contener letras y (- , . /).',
            'experiencia.*.subformularios.*.actividad_especifica.regex' => 'El campo Actividad Especif. solo puede contener letras y (- , . /).',
            'experiencia.*.subformularios.*.item_matriz.regex' => 'El campo Codigo IAF-Sector solo puede contener letras, números y (- , . / () - ).',
            'experiencia.*.subformularios.*.norma_documento_pers.regex' => 'El campo Codigo IAF-Sector solo puede contener letras, números y (- , . / () - ).',
            'experiencia.*.subformularios.*.tiempo_exp_pers.min' => 'El tiempo de experiencia debe ser de al menos de 2 años.',

            /* Reglas para ETISO_17034 */
            'experiencia.*.subformularios.*.ensayo_mat.regex' => 'El campo Ensayo solo puede contener letras y (- , . /).',
            'experiencia.*.subformularios.*.tecnica_mat.regex' => 'El campo Tecnica solo puede contener letras y (- , . /).',
            'experiencia.*.subformularios.*.norma_documento_mat.regex' => 'El campo Norma/Doc. solo puede contener letras, números y (- , . / () - ).',
            'experiencia.*.subformularios.*.item_ensayo_muestra.regex' => 'El campo Item Ensayo/Muestra solo puede contener letras, números y (- , . / () - ).',
            'experiencia.*.subformularios.*.tiempo_exp_mat.min' => 'El tiempo de experiencia debe ser de al menos de 2 años.'

            
        ];

        // 🔹 2. Reglas dinámicas según tipo de experiencia
        if ($request->has('experiencia')) {
            foreach ($request->experiencia as $i => $bloque) {
                $tipo = $bloque['area'] ?? null;
                if ($tipo && isset($bloque['subformularios'])) {
                    foreach ($bloque['subformularios'] as $j => $subform) {
                        switch ($tipo) {
                            case 'ETISO_17025en':
                                $rules["experiencia.$i.subformularios.$j.ensayo"] = ['required','string','min:3','regex:/^[A-Za-z\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.tecnica"] = ['required','string','min:3','regex:/^[A-Za-z\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.norma_doc"] = ['required','string','min:3','regex:/^[A-Za-z0-9\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.item_ensayo"] = ['required','string','min:3','regex:/^[A-Za-z0-9\s\.\-\/°]+$/u'];  
                                $rules["experiencia.$i.subformularios.$j.tiempo_exp"] = 'required|integer|min:2';
                                break;

                            case 'ETISO_17025cal':
                                $rules["experiencia.$i.subformularios.$j.magnitud"] = ['required','string','min:3','regex:/^[A-Za-z\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.item_calibracion"] = ['required', 'string', 'min:3', 'regex:/^[A-Za-z0-9\s\.\,\-\/°()]+$/u'];
                                $rules["experiencia.$i.subformularios.$j.norma_doc_cal"] = ['required', 'string', 'min:3', 'regex:/^[A-Za-z0-9\s\.\,\-\/°()]+$/u'];
                                $rules["experiencia.$i.subformularios.$j.tiempo_exp_cal"] = 'required|integer|min:2';
                                break;

                            case 'ETISO_15189':
                                $rules["experiencia.$i.subformularios.$j.area_campo"] = ['required','string','min:3','regex:/^[A-Za-z\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.analisis_examen"] = ['required', 'string', 'min:3', 'regex:/^[A-Za-z0-9\s\.\,\-\/°()]+$/u'];
                                $rules["experiencia.$i.subformularios.$j.tecnica_cli"] = ['required', 'string', 'min:3', 'regex:/^[A-Za-z0-9\s\.\,\-\/°()]+$/u'];
                                $rules["experiencia.$i.subformularios.$j.tiempo_exp_clinico"] = 'required|integer|min:2';
                                break;

                            case 'ETISO_17043est':
                                $rules["experiencia.$i.subformularios.$j.nombre_ea_cil"] = ['required','string','min:3','regex:/^[A-Za-z0-9\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.empresa_contratante"] = ['required','string','min:3','regex:/^[A-Za-z0-9\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.software_utilizado"] = ['required','string','min:3','regex:/^[A-Za-z0-9\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.norma_aplicada"] = ['required', 'string', 'min:3', 'regex:/^[A-Za-z0-9\s\.\,\-\/°()]+$/u'];
                                $rules["experiencia.$i.subformularios.$j.tiempo_desarrollo_meses"] = 'required|integer|min:1';
                                break;

                            case 'ETISO_17043tec':
                                $rules["experiencia.$i.subformularios.$j.ensayo_magnitud"] = ['required','string','min:3','regex:/^[A-Za-z0-9\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.tecnica_tec"] = ['required','string','min:3','regex:/^[A-Za-z0-9\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.norma_documento_tecnico"] = ['required','string','min:3','regex:/^[A-Za-z0-9\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.item_muestra"] = ['required','string','min:3','regex:/^[A-Za-z0-9\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.tiempo_exp_tecnico"] = ['required','integer','min:2','regex:/^[A-Za-z0-9\s\-\.,\/]+$/'];
                                break;

                            case 'ETISO_17020':
                                $rules["experiencia.$i.subformularios.$j.campo_sector"] = ['required','string','min:3','regex:/^[A-Za-z0-9\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.sub_sector"] = ['required','string','min:3','regex:/^[A-Za-z0-9\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.item_inspeccionado"] = ['required', 'string', 'min:3', 'regex:/^[A-Za-z0-9\s\.\,\-\/°()]+$/u'];
                                $rules["experiencia.$i.subformularios.$j.metodo_doc_normativo"] = ['required', 'string', 'min:3', 'regex:/^[A-Za-z0-9\s\.\,\-\/°()]+$/u'];
                                $rules["experiencia.$i.subformularios.$j.tiempo_exp_inspeccion"] = ['required','integer','min:2','regex:/^[A-Za-z0-9\s\-\.,\/]+$/'];
                                break;

                            case 'ETISO_17065':
                                $rules["experiencia.$i.subformularios.$j.tipo_certificacion"] = ['required','string','min:3','regex:/^[A-Za-z0-9\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.producto_servicio"] = ['required','string','min:3','regex:/^[A-Za-z0-9\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.documento_normativo"] = ['required','string','min:3','regex:/^[A-Za-z0-9\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.division_nace"] = ['required','string','min:3','regex:/^[A-Za-z0-9\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.codigo_cpa"] = ['required','string','min:3','regex:/^[A-Za-z0-9\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.tiempo_exp_producto"] = 'required|integer|min:2';
                                break;

                            case 'ETISO_17021_1':
                                $rules["experiencia.$i.subformularios.$j.sistema_gestion"] = ['required','string','min:3','regex:/^[A-Za-z\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.norma"] = ['required','string','min:3','regex:/^[A-Za-z0-9\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.codigo_iaf_sector"] = ['required','string','min:3','regex:/^[A-Za-z0-9\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.nombre_sector"] = ['required','string','min:3','regex:/^[A-Za-z\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.tiempo_exp_sg"] = 'required|integer|min:2';
                                break;

                            case 'ETISO_17024':
                                $rules["experiencia.$i.subformularios.$j.sector_campo"] = ['required','string','min:3','regex:/^[A-Za-z\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.actividad_especifica"] = ['required','string','min:3','regex:/^[A-Za-z\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.item_matriz"] = ['required', 'string', 'min:3', 'regex:/^[A-Za-z0-9\s\.\,\-\/°()]+$/u'];
                                $rules["experiencia.$i.subformularios.$j.norma_documento_pers"] = ['required', 'string', 'min:3', 'regex:/^[A-Za-z0-9\s\.\,\-\/°()]+$/u'];
                                $rules["experiencia.$i.subformularios.$j.tiempo_exp_pers"] = 'required|integer|min:2';
                                break;

                            case 'ETISO_17034':
                                $rules["experiencia.$i.subformularios.$j.ensayo_mat"] = ['required','string','min:3','regex:/^[A-Za-z\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.tecnica_mat"] = ['required','string','min:3','regex:/^[A-Za-z\s\-\.,\/]+$/'];
                                $rules["experiencia.$i.subformularios.$j.norma_documento_mat"] = ['required', 'string', 'min:3', 'regex:/^[A-Za-z0-9\s\.\,\-\/°()]+$/u'];
                                $rules["experiencia.$i.subformularios.$j.item_ensayo_muestra"] = ['required', 'string', 'min:3', 'regex:/^[A-Za-z0-9\s\.\,\-\/°()]+$/u'];
                                $rules["experiencia.$i.subformularios.$j.tiempo_exp_mat"] = 'required|integer|min:2';
                                break;
                        }
                    }
                }
            }
        }

        // 🔹 3. Ejecutar validación
        $validatedData = $request->validate($rules, $messages);

        // 🔹 4. Lógica de guardado original
        foreach ($request->experiencia as $bloqueIndex => $bloque) {
            $tipo = $bloque['area'] ?? null;

            if (!empty($tipo)) {
                // Procesar cada subformulario dentro del bloque
                if (isset($bloque['subformularios'])) {
                    foreach ($bloque['subformularios'] as $subIndex => $subformulario) {
                        $datos = [
                            'id_postulante' => $id_postulante
                        ];

                        switch($tipo) {
                            case 'ETISO_17025en':
                                $datos['ensayo']      = $this->limpiarTexto($subformulario['ensayo'] ?? null);
                                $datos['tecnica']     = $this->limpiarTexto($subformulario['tecnica'] ?? null);
                                $datos['norma_doc']   = $this->limpiarTexto($subformulario['norma_doc'] ?? null);
                                $datos['item_ensayo'] = $this->limpiarTexto($subformulario['item_ensayo'] ?? null);
                                $datos['tiempo_exp']  = $subformulario['tiempo_exp'] ?? null;
                                break;
                            case 'ETISO_17025cal':
                                $datos['magnitud'] = $this->limpiarTexto($subformulario['magnitud'] ?? null);
                                $datos['item_calibracion'] = $this->limpiarTexto($subformulario['item_calibracion'] ?? null);
                                $datos['norma_doc_cal'] = $this->limpiarTexto($subformulario['norma_doc_cal'] ?? null);
                                $datos['tiempo_exp_cal'] = $subformulario['tiempo_exp_cal'] ?? null;
                                break;
                            case 'ETISO_15189':
                                $datos['area_campo'] = $this->limpiarTexto($subformulario['area_campo'] ?? null);
                                $datos['analisis_examen'] = $this->limpiarTexto($subformulario['analisis_examen'] ?? null);
                                $datos['tecnica_cli'] = $this->limpiarTexto($subformulario['tecnica_cli'] ?? null);
                                $datos['muestra_matriz'] = $this->limpiarTexto($subformulario['muestra_matriz'] ?? null);
                                $datos['tiempo_exp_clinico'] = $subformulario['tiempo_exp_clinico'] ?? null;
                                break;
                            case 'ETISO_17043est':
                                $datos['nombre_ea_cil'] = $this->limpiarTexto($subformulario['nombre_ea_cil'] ?? null);
                                $datos['empresa_contratante'] = $this->limpiarTexto($subformulario['empresa_contratante'] ?? null);
                                $datos['software_utilizado'] = $this->limpiarTexto($subformulario['software_utilizado'] ?? null);
                                $datos['norma_aplicada'] = $this->limpiarTexto($subformulario['norma_aplicada'] ?? null);
                                $datos['tiempo_desarrollo_meses'] = $subformulario['tiempo_desarrollo_meses'] ?? null;
                                break;
                            case 'ETISO_17043tec':
                                $datos['ensayo_magnitud'] = $this->limpiarTexto($subformulario['ensayo_magnitud'] ?? null);
                                $datos['tecnica_tec'] = $this->limpiarTexto($subformulario['tecnica_tec'] ?? null);
                                $datos['norma_documento_tecnico'] = $this->limpiarTexto($subformulario['norma_documento_tecnico'] ?? null);
                                $datos['item_muestra'] = $this->limpiarTexto($subformulario['item_muestra'] ?? null);
                                $datos['tiempo_exp_tecnico'] = $subformulario['tiempo_exp_tecnico'] ?? null;
                                break;
                            case 'ETISO_17020':
                                $datos['campo_sector'] = $this->limpiarTexto($subformulario['campo_sector'] ?? null);
                                $datos['sub_sector'] = $this->limpiarTexto($subformulario['sub_sector'] ?? null);
                                $datos['item_inspeccionado'] = $this->limpiarTexto($subformulario['item_inspeccionado'] ?? null);
                                $datos['metodo_doc_normativo'] = $this->limpiarTexto($subformulario['metodo_doc_normativo'] ?? null);
                                $datos['tiempo_exp_inspeccion'] = $subformulario['tiempo_exp_inspeccion'] ?? null;
                                break;
                            case 'ETISO_17065':
                                $datos['tipo_certificacion'] = $this->limpiarTexto($subformulario['tipo_certificacion'] ?? null);
                                $datos['producto_servicio'] = $this->limpiarTexto($subformulario['producto_servicio'] ?? null);
                                $datos['documento_normativo'] = $this->limpiarTexto($subformulario['documento_normativo'] ?? null);
                                $datos['division_nace'] = $this->limpiarTexto($subformulario['division_nace'] ?? null);
                                $datos['codigo_cpa'] = $this->limpiarTexto($subformulario['codigo_cpa'] ?? null);
                                $datos['tiempo_exp_producto'] = $subformulario['tiempo_exp_producto'] ?? null;
                                break;
                            case 'ETISO_17021_1':
                                $datos['sistema_gestion'] = $this->limpiarTexto($subformulario['sistema_gestion'] ?? null);
                                $datos['norma'] = $this->limpiarTexto($subformulario['norma'] ?? null);
                                $datos['codigo_iaf_sector'] = $this->limpiarTexto($subformulario['codigo_iaf_sector'] ?? null);
                                $datos['nombre_sector'] = $this->limpiarTexto($subformulario['nombre_sector'] ?? null);
                                $datos['tiempo_exp_sg'] = $subformulario['tiempo_exp_sg'] ?? null;
                                break;
                            case 'ETISO_17024':
                                $datos['sector_campo'] = $this->limpiarTexto($subformulario['sector_campo'] ?? null);
                                $datos['actividad_especifica'] = $this->limpiarTexto($subformulario['actividad_especifica'] ?? null);
                                $datos['item_matriz'] = $this->limpiarTexto($subformulario['item_matriz'] ?? null);
                                $datos['norma_documento_pers'] = $this->limpiarTexto($subformulario['norma_documento_pers'] ?? null);
                                $datos['tiempo_exp_pers'] = $subformulario['tiempo_exp_pers'] ?? null;
                                break;
                            case 'ETISO_17034':
                                $datos['ensayo_mat'] = $this->limpiarTexto($subformulario['ensayo_mat'] ?? null);
                                $datos['tecnica_mat'] = $this->limpiarTexto($subformulario['tecnica_mat'] ?? null);
                                $datos['norma_documento_mat'] = $this->limpiarTexto($subformulario['norma_documento_mat'] ?? null);
                                $datos['item_ensayo_muestra'] = $this->limpiarTexto($subformulario['item_ensayo_muestra'] ?? null);
                                $datos['tiempo_exp_mat'] = $subformulario['tiempo_exp_mat'] ?? null;
                                break;
                        }

                        if (!ExpTecnica::guardarExperiencia($tipo, $datos)) {
                            $guardadoExitoso = false;
                            Log::error("Error al guardar experiencia tipo: $tipo, bloque: $bloqueIndex, subform: $subIndex");
                        }
                    }
                }
            }
        }

        // 🔹 5. Redirección con resultado
        if ($guardadoExitoso) {
            return redirect()->route('exptecnica.formulario', ['tab' => 'exp_tecnica'])
                ->with('success', 'Experiencia técnica guardada correctamente');
        } else {
            return redirect()->route('exptecnica.formulario', ['tab' => 'exp_tecnica'])
                ->with('error', 'Ocurrieron algunos errores al guardar la experiencia técnica');
        }
    }

    /**
     * Limpieza de texto antes de guardar
     */
    private function limpiarTexto($valor)
    {
        return is_string($valor) ? ucwords(strtolower(trim($valor))) : $valor;
    }
}
