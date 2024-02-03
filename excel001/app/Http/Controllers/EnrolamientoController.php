<?php

namespace App\Http\Controllers;

use App\Models\Enrolamiento;
use Illuminate\Http\Request;

class EnrolamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $enrolamientos = Enrolamiento::orderBy('id', 'desc')->paginate(100);
        return view('enrolamiento.index', compact('enrolamientos'))
            ->with('i', (request()->input('page', 1) - 1) * 100);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('enrolamiento.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'numbemp_bio' => 'required|string',
            'name_bio' => 'required|string',
            'rostro_bio' => 'required|string',
            
        ]);

        Enrolamiento::create($request->all());

        toastr()->success('Empleados created');
        return redirect()->route('enrolamiento.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Enrolamiento $enrolamiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrolamiento $enrolamiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enrolamiento $enrolamiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrolamiento $enrolamiento)
    {
        //
    }
}
