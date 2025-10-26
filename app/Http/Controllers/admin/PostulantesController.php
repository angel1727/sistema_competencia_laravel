<?php

namespace App\Http\Controllers\admin\postulantes;

use App\Http\Controllers\Controller;
use App\Models\postulante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PostulantesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.postulantes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            // Crear postulante
            $postulante = Postulante::create($request->only([
                'nombre',
                'apellido',
                'ci',
                'ciudad',
                'direccion',
                'nacionalidad',
                'email',
                'celularpost',
                'telefono',
                'nit',
                'siged',
                'matricula',
                'seguro',
                'sriesgos'
            ]));

            // Crear educación
            if ($request->has('educacion')) {
                foreach ($request->educacion as $edu) {
                    $postulante->educaciones()->create($edu);
                }
            }

            DB::commit();

            return redirect()->back()->with('success', 'Postulante registrado con éxito');
        } catch (\Throwable $e) {
            DB::rollBack();
            dd($e->getMessage()); // 👈 debug para ver el error real
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(postulante $postulante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(postulante $postulante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, postulante $postulante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(postulante $postulante)
    {
        //
    }
}
