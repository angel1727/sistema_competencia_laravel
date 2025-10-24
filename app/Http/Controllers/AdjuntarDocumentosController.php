<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdjuntarDocumentosController extends Controller
{
    /**
     * Mostrar formulario de adjuntar documentos
     */
    public function mostrarFormulario()
    {
        return view('formulario-completo');
    }
    
    /**
     * Cerrar sesión del postulante
     */
    public function cerrarSesion(Request $request)
    {
        // Eliminar solo el id_postulante de la sesión
        Session::forget('id_postulante');
        
        return response()->json(['cerrado' => true]);
    }

    /**
     * Verificar estado de la sesión (opcional - para AJAX)
     */
    public function verificarSesion()
    {
        return response()->json([
            'sesion_activa' => Session::has('id_postulante'),
            'id_postulante' => Session::get('id_postulante')
        ]);
    }
}