<?php

namespace App\Http\Controllers;

use App\Models\Horarios;
use Illuminate\Http\Request;

class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horarios = Horarios::orderBy('id', 'desc')->paginate(10);
        return view('horarios.index', compact('horarios'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }


    public function store(Request $request)
    {
        $request->validate([
            'numbemp_hr' => 'required|string',
          
        ]);

        Horarios::create($request->all());

        toastr()->success('Horarios created');
        return redirect()->route('horarios.index');
    }



}
