<?php

namespace App\Http\Controllers;

use App\Models\Postulante;
use Illuminate\Http\Request;

class PostulanteController extends Controller
{
    public function mostrarFormulario()
    {
        return view('formulario-completo');
    }

    public function guardarPostulante(Request $request)
    {
        // Validación de datos
        // La Validaion se usa los (names) de los campos en el formulario
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'ci' => [
                'required',
                'string',
                'unique:postulante,cedula_identidad',
                'regex:/^[A-Za-z0-9]+(-[A-Za-z0-9]+)?$/', // un guion medio permitido en el medio
            ],
            'ciudad' => [
                'required',
                'string',
                'max:255',
                'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/',// SOLO LETRAS Y ESPACIOS
            ],
            'nacionalidad' => [
                'nullable',
                'string',
                'max:255',
                'regex:/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/'
            ],
            'correo' => 'required|email',
            'telefono_movil' => ['nullable', 'regex:/^[0-9]{1,14}(-[0-9]{1,13})?$/'],
            'telefono_fijo'  => ['nullable', 'regex:/^[0-9]{1,14}(-[0-9]{1,13})?$/'],
            'nit' => ['required', 'string', 'regex:/^[A-Za-z0-9]+(?:[ -][A-Za-z0-9]+)*$/'],
            'sigep' => ['required', 'string', 'regex:/^[A-Za-z0-9]+(?:[ -][A-Za-z0-9]+)*$/'],
            'matricula_comercio' => ['required', 'string', 'regex:/^[A-Za-z0-9]+(?:[ -][A-Za-z0-9]+)*$/'],
            'seguro_salud' => ['required', 'string', 'regex:/^[A-Za-z0-9]+(?:[ -][A-Za-z0-9]+)*$/'],
            'seguro_riesgo' => ['required', 'string', 'regex:/^[A-Za-z0-9]+(?:[ -][A-Za-z0-9]+)*$/'],

        ],[
            'ci.regex' => 'El CI/PAS debe contener números, letras y un único guion en medio(caso de ser necesario).',
            'ciudad.regex' => 'El campo ciudad solo debe tener letras.',
            'nacionalidad.regex' => 'El campo nacionalidad solo debe tener letras.',
            'telefono_movil.regex' => 'El telf. móvil, solo debe tener números y (máx 15 caracteres).',
            'telefono_fijo.regex'  => 'El telf. fijo, solo  debe tener números y (máx de 15 caracteres).',
            'nit.regex' => 'El NIT, solo debe tener letras, números.',
            'sigep.regex' => 'El SIGEP, solo debe tener letras, números.',
            'matricula_comercio.regex' => 'La Matrícula, solo debe tener letras, números.',
            'seguro_salud.regex' => 'El Seguro Salud, solo debe tener letras, números.',
            'seguro_riesgo.regex' => 'El Seguro Riesgo, solo debe tener letras, números.',
        ]);


        // Guardar en la base de datos
        $postulante = Postulante::create([
            'nombres' => ucwords(strtolower(trim($request->nombres))),
            'apellidos' => ucwords(strtolower(trim($request->apellidos))),
            'cedula_identidad' => strtoupper(trim($request->ci)),
            'ciudad_residencia' => ucwords(strtolower(trim($request->ciudad))),
            'direccion_residencia' => ucwords(strtolower(trim($request->direccion))),
            'nacionalidad' => ucwords(strtolower(trim($request->nacionalidad))),
            'correo' => trim(strtolower($request->correo)),
            'telefono_movil' => $request->telefono_movil,
            'telefono_fijo' => $request->telefono_fijo,
            'nit' => strtolower(trim($request->nit)),
            'registro_sigep' => strtolower(trim($request->sigep)),
            'matricula_comercio' => strtolower(trim($request->matricula_comercio)),
            'seguro_salud' => ucwords(strtolower(trim($request->seguro_salud))),
            'seguro_riesgos' => strtolower(trim($request->seguro_riesgo)),
        ]);

        // Guardar ID en sesión (usa idpostulante)
        session(['id_postulante' => $postulante->id_postulante]);

        /*return redirect()->route('inicio')
            ->with('success', 'Datos guardados correctamente.');*/
        return redirect()->route('inicio', ['tab' => 'personales'])
            ->with('success', 'Datos guardados correctamente.');
    }
}