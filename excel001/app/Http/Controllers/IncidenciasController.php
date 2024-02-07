<?php

namespace App\Http\Controllers;

use App\Models\Incidencias;
use Illuminate\Http\Request;

class IncidenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incidencias = incidencias::orderBy('id', 'desc')->paginate(50);
        return view('incidencias.index', compact('incidencias'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
        
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
        $request->validate([
            'numemp_in' => 'required|string',
            'clave_hor' => 'required|string',
            'horario' => 'required|string',
            'fecha_ini' => 'required|string',
            'fecha_fin' => 'required|string',
            'incidencia' => 'required|string',
            'detalle_hor' => 'required|string',
            'reg_entrada' => 'required|string',
            'reg_salida' => 'required|string',
            'horas_trabajadas' => 'required|string',
            'observaciones' => 'required|string',
        ]);

        Incidencias::create($request->all());

        toastr()->success('Incidencias created');
        return redirect()->route('incidencias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Incidencias $incidencias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incidencias $incidencias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incidencias $incidencias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incidencias $incidencias)
    {
        //
    }
}






