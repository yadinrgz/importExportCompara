<?php

namespace App\Exports;

use App\Models\Emplingresio;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EmpleadosExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():view
    {
        return view('empleados.export', [
            'empleados' => Emplingresio::all(),
        ]);
    }
}
