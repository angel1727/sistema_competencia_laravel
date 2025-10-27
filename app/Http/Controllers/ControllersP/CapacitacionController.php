<?php

namespace App\Http\Controllers\ControllersP;

use App\Models\ModelsP\Capacitacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CapacitacionController extends Controller
{
    /**
     * Mostrar formulario de capacitación
     */
    public function mostrarFormulario()
    {
        return view('formulario-completo');
    }

    /**
     * Guardar múltiples capacitaciones (misma lógica que el original)
     */
    public function guardarMultiplesCapacitaciones(Request $request)
    {
        // Verificar sesión de postulante (igual que el original)
        if (!Session::has('id_postulante')) {
            return redirect()->route('postulante.formulario')
                ->with('error', 'Primero debe completar sus datos personales');
        }

        // Reglas y mensajes personalizados
        $rules = [];
        $messages = [];

        if ($request->has('tipo_capacitacion')) {
            foreach ($request->tipo_capacitacion as $index => $tipo) {
                $tipo_trimmed = trim($tipo);
                $area = $request->area[$index] ?? null;
                $area_trimmed = trim($area);

                // Validar solo si hay algún dato en tipo_capacitacion o area
                if ($tipo_trimmed !== '' || $area_trimmed !== '') {
                    // Solo validamos si hay datos en la fila
                    $rules["tipo_capacitacion.$index"] = ['required', 'string', 'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñÜü\s]+$/'];
                    $rules["area.$index"] = ['required', 'string', 'max:255'];
                    $rules["tema_capacitacion.$index"] = ['required', 'string', 'regex:/^[A-Za-z0-9\s:\/\-áéíóúÁÉÍÓÚñÑüÜ()]+$/'];
                    $rules["organismo_capacitacion.$index"] = ['required', 'string', 'regex:/^[A-Za-z0-9ÁÉÍÓÚáéíóúÑñÜü\s()\/\-]+$/'];
                    $rules["fecha_capacitacion.$index"] = ['required', 'date','before_or_equal:today'];
                    $rules["duracion_horas_capacitacion.$index"] = ['required', 'numeric', 'min:1'];

                    $fila = $index + 1;

                    $messages["tipo_capacitacion.$index.required"] = "El tipo de capacitación en la fila $fila es obligatorio.";
                    $messages["tipo_capacitacion.$index.regex"] = "El tipo de capacitación en la fila $fila solo puede contener letras.";

                    $messages["area.$index.required"] = "El área en la fila $fila es obligatoria.";
                    $messages["tema_capacitacion.$index.required"] = "El tema de capacitación en la fila $fila es obligatorio.";
                    $messages["tema_capacitacion.$index.regex"] = "El tema de capacitación en la fila $fila solo puede contener letras, números, espacios, guiones, dos puntos y '/'.";

                    $messages["organismo_capacitacion.$index.required"] = "El organismo en la fila $fila es obligatorio.";
                    $messages["organismo_capacitacion.$index.regex"] = "El organismo en la fila $fila solo puede contener letras, números, paréntesis, guiones, slash (/) y espacios.";

                    $messages["fecha_capacitacion.$index.required"] = "La fecha de capacitación en la fila $fila es obligatoria.";
                    $messages["fecha_capacitacion.$index.before_or_equal"] = "La fecha de capacitación en la fila $fila no puede ser posterior a hoy.";

                    $messages["duracion_horas_capacitacion.$index.required"] = "La duración en horas en la fila $fila es obligatoria.";
                    $messages["duracion_horas_capacitacion.$index.min"] = "La duración en meses en la fila $fila debe ser mayor a cero.";
                }
            }
        }

        // Validar manualmente
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Procesar formularios clonados (igual que el original)
        $registros = [];
        if ($request->has('area') && is_array($request->area)) {
            foreach ($request->area as $index => $area) {
                // Validar campo obligatorio (área) - igual que el original
                if (!empty(trim($area))) {
                    $registros[] = [
                        'area' => ucwords(strtolower(trim($area))),
                        'tipo_capacitacion' => isset($request->tipo_capacitacion[$index]) ? ucwords(strtolower(trim($request->tipo_capacitacion[$index]))) : null,
                        'tema_capacitacion' => isset($request->tema_capacitacion[$index]) ? ucwords(strtolower(trim($request->tema_capacitacion[$index]))) : null,
                        'organismo_capacitacion' => isset($request->organismo_capacitacion[$index]) ? ucwords(strtolower(trim($request->organismo_capacitacion[$index]))) : null,
                        'fecha_capacitacion' => $request->fecha_capacitacion[$index] ?? null,
                        'duracion_horas_capacitacion' => $request->duracion_horas_capacitacion[$index] ?? 0,
                        'id_postulante' => Session::get('id_postulante')
                    ];
                }
            }
        }

        // Guardar solo si hay registros válidos (igual que el original)
        if (!empty($registros) && Capacitacion::guardarMultiplesCapacitaciones($registros)) {
            return redirect()->route('capacitacion.formulario', ['tab' => 'capacitacion']) // <-- CORREGIDO
                ->with('success', 'Datos de capacitación guardados correctamente'); // <-- CORREGIDO el mensaje
        } else {
            return redirect()->route('capacitacion.formulario', ['tab' => 'capacitacion']) // <-- CORREGIDO
                ->with('error', 'Ocurrieron algunos errores al guardar los datos de capacitación'); // <-- CORREGIDO el mensaje
        }
    }
}