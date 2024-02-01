<?php

namespace App\Http\Controllers;

use App\Models\Emplingresio;
use Illuminate\Http\Request;

class EmplingresioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Emplingresio::orderBy('id', 'desc')->paginate(100);
        return view('empleados.index', compact('empleados'))
            ->with('i', (request()->input('page', 1) - 1) * 100);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'empnumber_ingsio' => 'required|string',
            'name_ingsio' => 'required|string',
            
        ]);

        Emplingresio::create($request->all());

        toastr()->success('Empleados created');
        return redirect()->route('empleados.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Emplingresio $emplingresio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emplingresio $emplingresio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Emplingresio $emplingresio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emplingresio $emplingresio)
    {
        //
    }
}
