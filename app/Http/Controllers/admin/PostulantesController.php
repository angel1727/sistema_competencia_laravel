<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\postulantes;
use Illuminate\Http\Request;


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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(postulantes $postulantes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(postulantes $postulantes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, postulantes $postulantes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(postulantes $postulantes)
    {
        //
    }
}
