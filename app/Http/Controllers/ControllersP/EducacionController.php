<?php

namespace App\Http\Controllers\ControllersP;

use App\Models\ModelsP\Educacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EducacionController extends Controller
{
    public function mostrarFormulario()
    {
        return view('formulario-completo');
    }

    public function guardarMultiples(Request $request)
    {
        // Verifica que exista id_postulante
        if (!$request->session()->has('id_postulante')) {
            return redirect()->route('postulante.formulario')
                ->with('error', 'Primero debe completar sus datos personales');
        }

        $id_postulante = $request->session()->get('id_postulante');

        // Construir reglas dinámicas condicionales
        $rules = [];
        $messages = [];

        // Educación formal: solo validar filas donde nivel_academico no esté vacío (trim)
        if ($request->has('nivel_academico')) {
            foreach ($request->nivel_academico as $i => $nivel) {
                if (trim($nivel) !== '') {
                    // Solo para estas filas que no están vacías
                    $rules["nivel_academico.$i"] = ['required', 'string', 'regex:/^[A-Za-z\s]+$/'];
                    $rules["grado_obtenido.$i"] = ['required', 'string', 'regex:/^[A-Za-z\s]+$/'];
                    $rules["centro_educativo.$i"] = ['required', 'string', 'regex:/^[A-Za-z\s]+$/'];
                    $rules["fecha_titulo.$i"] = ['required', 'date'];

                    $messages["nivel_academico.$i.required"] = "El nivel académico en la fila " . ($i+1) . " es obligatorio.";
                    $messages["grado_obtenido.$i.required"] = "El grado obtenido en la fila " . ($i+1) . " es obligatorio.";
                    $messages["centro_educativo.$i.required"] = "El centro educativo en la fila " . ($i+1) . " es obligatorio.";
                    $messages["fecha_titulo.$i.required"] = "La fecha del título en la fila " . ($i+1) . " es obligatoria.";
                    $messages["nivel_academico.$i.regex"] = "El nivel académico solo puede contener letras.";
                    // (puedes agregar mensajes para regex de otros campos si lo deseas)
                }
            }
        }

        // Idiomas: solo validar filas donde idioma no esté vacío
        if ($request->has('idioma')) {
            foreach ($request->idioma as $j => $idioma) {
                if (trim($idioma) !== '') {
                    // aplicar reglas solo si usuario ingresó algo en idioma
                    $rules["idioma.$j"] = ['required', 'string', 'regex:/^[A-Za-z\s]+$/'];
                    $rules["nivel_escritura.$j"] = ['required'];
                    $rules["nivel_oral.$j"] = ['required'];
                    $rules["nombre_curso.$j"] = ['required', 'string', 'regex:/^[A-Za-z\s]+$/'];
                    $rules["entidad_certificacion.$j"] = ['required', 'string', 'regex:/^[A-Za-z\s]+$/'];
                    $rules["fecha_emision.$j"] = ['required', 'date'];

                    $messages["idioma.$j.required"] = "El idioma en la fila " . ($j+1) . " es obligatorio.";
                    $messages["idioma.$j.regex"] = "El idioma solo puede tener letras";

                    $messages["nivel_escritura.$j.required"] = "Seleccione nivel de escritura en la fila " . ($j+1) . ".";
                    $messages["nivel_oral.$j.required"] = "Seleccione nivel oral en la fila " . ($j+1) . ".";

                    $messages["nombre_curso.$j.regex"] = "El nombre del curso solo puede tener letras.";
                    $messages["entidad_certificacion.$j.regex"] = "La entidad certificadora solo puede tener letras.";

                    $messages["fecha_emision.$j.date"] = "La fecha de emisión en la fila " . ($j+1) . " debe ser una fecha válida.";
                }
            }
        }

        //validar Conocimiento en TICs
        if ($request->has('herramienta_tecnologia')) {
            foreach ($request->herramienta_tecnologia as $k => $herr) {
                if (trim($herr) !== '') {
                    $rules["herramienta_tecnologia.$k"] = ['required', 'string', 'regex:/^[A-Za-z\s]+$/'];
                    $rules["nivel_conocimiento.$k"] = ['required'];
                    $rules["frecuencia_uso.$k"] = ['required'];
                    $rules["certificacion.$k"] = ['required'];
                    $rules["nombre_entidad_capacitacion.$k"] = ['required', 'string', 'regex:/^[A-Za-z\s]+$/'];
                    $rules["fecha_tic.$k"] = ['required', 'date'];

                    $messages["herramienta_tecnologia.$k.required"] = "La herramienta/tecnología en la fila " . ($k+1) . " es obligatoria.";
                    $messages["herramienta_tecnologia.$k.regex"] = "La herramienta sólo puede tener letras.";

                    $messages["nivel_conocimiento.$k.required"] = "Seleccione nivel de conocimiento en la fila " . ($k+1) . ".";
                    $messages["frecuencia_uso.$k.required"] = "Seleccione frecuencia de uso en la fila " . ($k+1) . ".";
                    $messages["certificacion.$k.required"] = "Seleccione si tiene certificación en la fila " . ($k+1) . ".";

                    $messages["nombre_entidad_capacitacion.$k.regex"] = "El nombre de capacitación solo puede tener letras.";
                    $messages["fecha_tic.$k.date"] = "La fecha en la fila " . ($k+1) . " debe ser una fecha válida.";
                }
            }
        }


        // Validar con las reglas construidas
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $guardadoExitoso = true;

        // Guardar Educación Formal
        if ($request->has('nivel_academico')) {
            foreach ($request->nivel_academico as $i => $nivel) {
                if (trim($nivel) !== '') {
                    $datosEducacion = [
                        'nivel_academico' => ucwords(strtolower(trim($nivel))),
                        'grado_obtenido' => isset($request->grado_obtenido[$i])
                            ? ucwords(strtolower(trim($request->grado_obtenido[$i]))): null,
                        'centro_educativo' => isset($request->centro_educativo[$i])
                            ? ucwords(strtolower(trim($request->centro_educativo[$i]))): null,
                        'fecha_titulo' => $request->fecha_titulo[$i] ?? null,
                        'id_postulante' => $id_postulante
                    ];

                    if (!Educacion::guardarEducacionFormal($datosEducacion)) {
                        $guardadoExitoso = false;
                    }
                }
            }
        }

        // Guardar Idiomas
        if ($request->has('idioma')) {
            foreach ($request->idioma as $j => $idioma) {
                if (trim($idioma) !== '') {
                    $datosIdioma = [
                        'idioma' => ucwords(strtolower(trim($idioma))),
                        'nivel_escritura' => isset($request->nivel_escritura[$j])
                            ? ucwords(strtolower(trim($request->nivel_escritura[$j])))
                            : null,
                        'nivel_oral' => isset($request->nivel_oral[$j])
                            ? ucwords(strtolower(trim($request->nivel_oral[$j])))
                            : null,
                        'nombre_curso' => isset($request->nombre_curso[$j])
                            ? ucwords(strtolower(trim($request->nombre_curso[$j])))
                            : null,
                        'entidad_certificacion' => isset($request->entidad_certificacion[$j])
                            ? ucwords(strtolower(trim($request->entidad_certificacion[$j])))
                            : null,
                        'fecha_emision' => $request->fecha_emision[$j] ?? null,
                        'id_postulante' => $id_postulante
                    ];

                    if (!Educacion::guardarIdioma($datosIdioma)) {
                        $guardadoExitoso = false;
                    }
                }
            }
        }

        // 3. Conocimiento en TICs - Tabla: conocimiento_tic
        if ($request->has('herramienta_tecnologia')) {
            foreach ($request->herramienta_tecnologia as $k => $herr) {
                if (trim($herr) !== '') {
                    $datosTic = [
                        'herramienta_tecnologia' => ucwords(strtolower(trim($herr))),
                        'nivel_conocimiento' => $request->nivel_conocimiento[$k] ?? null,
                        'frecuencia_uso' => $request->frecuencia_uso[$k] ?? null,
                        'certificacion' => $request->certificacion[$k] ?? null,
                        'nombre_entidad_capacitacion' => isset($request->nombre_entidad_capacitacion[$k])
                            ? ucwords(strtolower(trim($request->nombre_entidad_capacitacion[$k]))): null,
                        'fecha_tic' => $request->fecha_tic[$k] ?? null,
                        'id_postulante' => $id_postulante
                    ];

                    if (!Educacion::guardarTic($datosTic)) {
                        $guardadoExitoso = false;
                    }
                }
            }
        }

        if ($guardadoExitoso) {
            return redirect()->route('educacion.formulario', ['tab' => 'formacion'])
                ->with('success', 'Datos de educación guardados correctamente');
        } else {
            return redirect()->route('educacion.formulario', ['tab' => 'formacion'])
                ->with('error', 'Ocurrieron algunos errores al guardar los datos');
        }
    }
}