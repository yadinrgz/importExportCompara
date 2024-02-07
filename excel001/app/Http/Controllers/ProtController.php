<?php

namespace App\Http\Controllers;

use App\Models\Prot;
use Illuminate\Http\Request;

class ProtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lectores = Prot::orderBy('id', 'desc')->paginate(100);
        return view('lectores.index', compact('lectores'))
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
            'clave' => 'required|string',
            'lector' => 'required|string',
            'nombre_lector' => 'required|string',
            'serie' => 'required|string',
            'host' => 'required|string',
            'ip' => 'required|string',
            'terminal' => 'required|string',
            'puerto' => 'required|string',
          ]);

        Prot::create($request->all());

        toastr()->success('Horarios created');
        return redirect()->route('lectores.index');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Prot $prot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prot $prot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prot $prot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prot $prot)
    {
        //
    }
}
