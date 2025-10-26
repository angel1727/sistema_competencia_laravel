<?php

namespace App\Http\Controllers;

use App\Models\Experiencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExperienciaController extends Controller
{
    public function mostrarFormulario()
    {
        return view('formulario-completo');
    }

    public function guardarTodo(Request $request)
    {
        if (!$request->session()->has('id_postulante')) {
            return redirect()->route('postulante.formulario')
                ->with('error', 'Primero debe completar sus datos personales');
        }

        $id_postulante = $request->session()->get('id_postulante');
        $guardadoExitoso = true;

        // Validación Empresa Actual
        if ($request->has('empresa') && !empty(trim($request->empresa))) {
            $rulesEmpresa = [
                'empresa' => ['required', 'string', 'regex:/^[A-Za-z\s]+$/'],
                'empresa_direccion' => ['required', 'string', 'max:150'],
                'departamento' => ['required', 'string', 'regex:/^[A-Za-z\s]+$/'],
                'empresa_telefono' => ['required', 'regex:/^(?!-)(?!.*--)([0-9]+-?[0-9]+)$/', 'max:15'],
                'empresa_correo' => ['required', 'email:rfc,dns'],
                'cargo' => ['required', 'string', 'regex:/^[A-Za-z\s]+$/'],
                'tiempo_permanencia' => ['required', 'string', 'regex:/^[\pL\pN\s]+$/u'], // solo números espacios letras
                'persona_referencia' => ['required', 'string', 'regex:/^[A-Za-z\s]+$/'],
                'telefono_referencia' => ['nullable', 'regex:/^(?!-)(?!.*--)[0-9]+-?[0-9]+$/', 'max:15'],
                'descripcion_responsabilidades' => ['nullable', 'string', 'max:500'],
            ];

            $messagesEmpresa = [
                'empresa.required' => 'El campo empresa es obligatorio.',
                'empresa.regex' => 'El campo solo debe contener letras.',
                'empresa_direccion'=>'El campo direccion es obligatorio',
                'departamento.regex' => 'El departamento solo debe contener letras.',
                'empresa_telefono.required' => 'El campo teléfono es obligatorio.',
                'empresa_telefono.regex' => 'El teléfono debe contener solo números (máx 15 dígitos)',
                'empresa_correo.email' => 'El correo debe tener un formato válido (@dominio.com)',
                'cargo.regex' => 'El cargo solo debe contener letras.',
                'tiempo_permanencia.regex' => 'Solo se permiten letras y números.',
                'persona_referencia.regex' => 'El nombre de la referencia solo debe contener letras.',
                'telefono_referencia.regex' => 'El teléfono de referencia debe contener solo números (máx 15 dígitos)',
                'descripcion_responsabilidades.max' => 'La descripción no debe superar los 500 caracteres.',
            ];

            $validator = Validator::make($request->all(), $rulesEmpresa, $messagesEmpresa);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
        }

        // VALIDACIONES DINÁMICAS
        $rules = [];
        $messages = [];

        // 1. EXPERIENCIA LABORAL (empresa_institucion[])
        if ($request->has('empresa_institucion')) {
            foreach ($request->empresa_institucion as $i => $empresa) {
                if (trim($empresa) !== '') {
                    $rules["empresa_institucion.$i"] = ['required', 'string', 'regex:/^[A-Za-z\s]+$/'];
                    $rules["tipo_organizacion.$i"] = ['required', 'string', 'regex:/^[A-Za-z\s]+$/'];
                    $rules["cargo_desempenado.$i"] = ['required', 'string', 'regex:/^[A-Za-z\s]+$/'];
                    $rules["fecha_desde.$i"] = ['required', 'date'];
                    $rules["fecha_hasta.$i"] = ['required', 'date'];
                    $rules["duracion_meses.$i"] = ['required', 'numeric', 'min:1'];
                    $rules["descripcion_actividades.$i"] = ['nullable', 'string', 'max:500'];

                    $messages["empresa_institucion.$i.required"] = "La empresa/institución en la fila " . ($i+1) . " es obligatorio.";
                    $messages["empresa_institucion.$i.regex"] = "El campo empresa en la fila " . ($i+1) . " solo debe contener letras.";
                    $messages["tipo_organizacion.$i.required"] = "El tipo de organización en la fila " . ($i+1) . " es obligatorio.";
                    $messages["tipo_organizacion.$i.regex"] = "El campo tipo organizacion en la fila " . ($i+1) . " solo debe contener letras.";
                    $messages["cargo_desempenado.$i.required"] = "El cargo desempeñado en la fila " . ($i+1) . " es obligatorio.";
                    $messages["tipo_organizacion.$i.regex"] = "El campo cargo desem. en la fila " . ($i+1) . " solo debe contener letras.";
                    $messages["fecha_desde.$i.required"] = "La fecha desde en la fila " . ($i+1) . " es obligatoria.";
                    $messages["fecha_hasta.$i.required"] = "La fecha hasta en la fila " . ($i+1) . " es obligatoria.";
                    $messages["duracion_meses.$i.required"] = "La duración en meses en la fila " . ($i+1) . " es obligatoria.";
                    $messages["duracion_meses.$i.min"] = "La duración en meses en la fila " . ($i + 1) . " debe ser mayor a cero.";
                    $messages["descripcion_actividades.$i.max"] = "El campo actividades en la fila " . ($i + 1) . " no puede superar los 500 caracteres.";
                }
            }
        }

        // 2. AUDITORÍAS (organizacion_servicio[])
        if ($request->has('organizacion_servicio')) {
            foreach ($request->organizacion_servicio as $j => $org) {
                if (trim($org) !== '') {
                    $rules["area.$j"] = ['required', 'string'];
                    $rules["organizacion_servicio.$j"] = ['required', 'string', 'regex:/^[A-Za-z\s]+$/'];
                    $rules["organizacion_evaluada.$j"] = ['required', 'string', 'regex:/^[A-Za-z\s]+$/'];
                    $rules["tipo_organismo.$j"] = ['required', 'string', 'regex:/^[A-Za-z\s]+$/'];
                    $rules["rol_designado.$j"] = ['required', 'string', 'regex:/^[A-Za-z\s]+$/'];
                    $rules["norma_aplicada.$j"] = ['required', 'string', 'regex:/^[A-Za-z0-9\s]+$/'];
                    $rules["fecha.$j"] = ['required', 'date'];
                    $rules["duracion_horas.$j"] = ['required', 'numeric', 'min:1'];

                    $messages["area.$j.required"] = "Debe seleccionar el tipo de auditoría en la fila " . ($j+1) . ".";
                    $messages["organizacion_servicio.$j.required"] = "La organización del servicio en la fila " . ($j+1) . " es obligatoria.";
                    $messages["organizacion_servicio.$j.regex"] = "La organización del servicio en la fila " . ($j+1) . " solo debe contener letras.";
                    $messages["organizacion_evaluada.$j.required"] = "La organización evaluada en la fila " . ($j+1) . " es obligatoria.";
                    $messages["organizacion_evaluada.$j.regex"] = "La organización del evaluada en la fila " . ($j+1) . " solo debe contener letras.";
                    $messages["tipo_organismo.$j.required"] = "El tipo de organismo en la fila " . ($j+1) . " es obligatorio.";
                    $messages["tipo_organismo.$j.regex"] = "La tipo de organismo en la fila " . ($j+1) . " solo debe contener letras.";
                    $messages["rol_designado.$j.required"] = "El rol designado en la fila " . ($j+1) . " es obligatorio.";
                    $messages["rol_designado.$j.regex"] = "El rol designado en la fila " . ($j+1) . " solo debe contener letras.";
                    $messages["norma_aplicada.$j.required"] = "La norma_aplicada en la fila " . ($j+1) . " es obligatorio.";
                    $messages["norma_aplicada.$j.regex"] = "El campo en la fila " . ($j+1) . " solo debe contener letras y numeros.";
                    $messages["fecha.$j.required"] = "La fecha en la fila " . ($j+1) . " es obligatoria.";
                    $messages["duracion_horas.$j.required"] = "La duración en horas en la fila " . ($j+1) . " es obligatoria.";
                    $messages["duracion_horas.$j.min"] = "La duración en meses en la fila " . ($j + 1) . " debe ser mayor a cero.";

                }
            }
        }
        
        // 3. CONSULTORÍAS (organizacion_servicio_consul[])
        if ($request->has('organizacion_servicio_consul')) {
            foreach ($request->organizacion_servicio_consul as $k => $org) {
                if (trim($org) !== '') {
                    $rules["organizacion_servicio_consul.$k"] = ['required', 'string', 'regex:/^[A-Za-z\s]+$/'];
                    $rules["organizacion_beneficiada.$k"] = ['required', 'string', 'regex:/^[A-Za-z\s]+$/'];
                    $rules["funcion.$k"] = ['required', 'string', 'regex:/^[A-Za-z\s]+$/'];
                    $rules["fecha_consul.$k"] = ['required', 'date'];
                    $rules["duracion_horas_consul.$k"] = ['required', 'numeric', 'min:1'];

                    $messages["organizacion_servicio_consul.$k.required"] = "La organización del servicio en la fila " . ($k+1) . " es obligatoria.";
                    $messages["organizacion_servicio_consul.$k.regex"] = "El campo en la fila " . ($k+1) . " solo debe contener letras.";
                    $messages["organizacion_beneficiada.$k.required"] = "La organización beneficiada en la fila " . ($k+1) . " es obligatoria.";
                    $messages["organizacion_beneficiada.$k.regex"] = "El campo en la fila " . ($k+1) . " solo debe contener letras.";
                    $messages["funcion.$k.required"] = "La función en la fila " . ($k+1) . " es obligatoria.";
                    $messages["funcion.$k.regex"] = "El campo en la fila " . ($k+1) . " solo debe contener letras.";
                    $messages["fecha_consul.$k.required"] = "La fecha en la fila " . ($k+1) . " es obligatoria.";
                    $messages["duracion_horas_consul.$k.required"] = "La duración en horas en la fila " . ($k+1) . " es obligatoria.";
                    $messages["duracion_horas_consul.$k.min"] = "La duración en horas en la fila " . ($k + 1) . " debe ser mayor a cero.";
                }
            }
        }

        // Lanzar validación global si se definieron reglas
        if (!empty($rules)) {
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
        }

        // 1. Empresa Actual (Solo 1 registro) - Tabla: infolaboral
        if ($request->has('empresa') && !empty(trim($request->empresa))) {
            $datosEmpresa = [
                'empresa' => ucwords(strtolower(trim($request->empresa))),
                'empresa_direccion' => ucwords(strtolower(trim($request->empresa_direccion))) ?? null,
                'departamento' => ucwords(strtolower(trim($request->departamento))) ?? null,
                'empresa_telefono' => $request->empresa_telefono ?? null, // no tocar
                'empresa_correo' => trim($request->empresa_correo) ?? null, // solo limpiar y pasar a minúsculas
                'cargo' => ucwords(strtolower(trim($request->cargo))) ?? null,
                'tiempo_permanencia' => $request->tiempo_permanencia ?? null,
                'persona_referencia' => ucwords(strtolower(trim($request->persona_referencia))) ?? null,
                'telefono_referencia' => $request->telefono_referencia ?? null,
                'descripcion_responsabilidades' => ucfirst(strtolower(trim($request->descripcion_responsabilidades))) ?? null, // solo primera letra en mayúscula
                'id_postulante' => $id_postulante
            ];

            if (!Experiencia::guardarEmpresaActual($datosEmpresa)) {
                $guardadoExitoso = false;
            }
        }

        // 2. Experiencia Laboral (Múltiples registros) - Tabla: experiencialaboral
        if ($request->has('empresa_institucion')) {
            foreach ($request->empresa_institucion as $i => $empresai) {
                if (!empty(trim($empresai))) {
                    $datosLaboral = [
                        'empresai' => ucwords(strtolower(trim($empresai))),
                        'tipo_organizacion' => isset($request->tipo_organizacion[$i]) ? ucwords(strtolower(trim($request->tipo_organizacion[$i]))) : null,
                        'cargo_desempenado' => isset($request->cargo_desempenado[$i]) ? ucwords(strtolower(trim($request->cargo_desempenado[$i]))) : null,
                        'fecha_desde' => $request->fecha_desde[$i] ?? null,
                        'fecha_hasta' => $request->fecha_hasta[$i] ?? null,
                        'duracion_meses' => $request->duracion_meses[$i] ?? null,
                        'descripcion_actividades' => isset($request->descripcion_actividades[$i]) ? ucwords(strtolower(trim($request->descripcion_actividades[$i]))) : null,
                        'id_postulante' => $id_postulante
                    ];

                    if (!Experiencia::guardarExperienciaLaboral($datosLaboral)) {
                        $guardadoExitoso = false;
                    }
                }
            }
        }

        // 3. Auditorías (Múltiples registros) - Tabla: experienciaaudiriaud
        if ($request->has('organizacion_servicio')) {
            foreach ($request->organizacion_servicio as $j=> $organizacion) {
                if (!empty(trim($organizacion))) {
                    $datosAuditoria = [
                        'area' => $request->area[$j] ?? null,
                        'organizacion_servicio' => ucwords(strtolower(trim($organizacion))),
                        'organizacion_evaluada' => isset($request->organizacion_evaluada[$j]) ? ucwords(strtolower(trim($request->organizacion_evaluada[$j]))) : null,
                        'tipo_organismo' => isset($request->tipo_organismo[$j]) ? ucwords(strtolower(trim($request->tipo_organismo[$j]))) : null,
                        'rol_designado' => isset($request->rol_designado[$j]) ? ucwords(strtolower(trim($request->rol_designado[$j]))) : null,
                        'norma_aplicada' => isset($request->norma_aplicada[$j]) ? ucwords(strtolower(trim($request->norma_aplicada[$j]))) : null,
                        'fecha' => $request->fecha[$j] ?? null,
                        'duracion_horas' => $request->duracion_horas[$j] ?? null,
                        'id_postulante' => $id_postulante
                    ];

                    if (!Experiencia::guardarAuditorias($datosAuditoria)) {
                        $guardadoExitoso = false;
                    }
                }
            }
        }

        // 4. Consultorías (Múltiples registros) - Tabla: experienciaimpementacion
        if ($request->has('organizacion_servicio_consul')) {
            foreach ($request->organizacion_servicio_consul as $k => $organizacion) {
                if (!empty(trim($organizacion))) {
                    $datosConsultoria = [
                        'organizacion_servicio_consul' => ucwords(strtolower(trim($organizacion))),
                        'organizacion_beneficiada' => isset($request->organizacion_beneficiada[$k]) ? ucwords(strtolower(trim($request->organizacion_beneficiada[$k]))) : null,
                        'funcion' => isset($request->funcion[$k]) ? ucwords(strtolower(trim($request->funcion[$k]))) : null,
                        'fecha_consul' => $request->fecha_consul[$k] ?? null,
                        'duracion_horas_consul' => $request->duracion_horas_consul[$k] ?? null,
                        'id_postulante' => $id_postulante
                    ];

                    if (!Experiencia::guardarConsultorias($datosConsultoria)) {
                        $guardadoExitoso = false;
                    }
                }
            }
        }

        if ($guardadoExitoso) {
            return redirect()->route('experiencia.formulario', ['tab' => 'experiencia'])
                ->with('success', 'Datos de experiencia guardados correctamente');
        } else {
            return redirect()->route('experiencia.formulario', ['tab' => 'experiencia'])
                ->with('error', 'Ocurrieron algunos errores al guardar los datos');
        }
    }
}