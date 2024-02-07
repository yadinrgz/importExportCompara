<?php

namespace App\Http\Controllers;

use App\Models\Incidencias;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class IncidenciasExcelController extends Controller
{
    public function import(Request $request)
    {
        $file = $request->file('file');

        $data = Excel::toArray($file);

        $empleados = [];
        $empleadoAnterior = null;

        foreach ($data[0] as $row) {
            if (empty($row[0])) {
                $empleados[] = $empleadoAnterior;
            } else {
                $empleadoAnterior = [
                    'numemp_in' => $row['0'],
                    'clave_hor' => $row['6'],
                    'horario' => $row['7'],
                    'fecha_ini' => $row['8'],
                    'fecha_fin' => $row['9'],
                    'incidencia' => $row['11'],
                    'detalle_hor' => $row['12'],
                    'reg_entrada' => $row['13'],
                    'reg_salida' => $row['14'],
                    'horas_trabajadas' => $row['15'],
                    'observaciones' => $row['17'],
                ];
            }
        }
    

        Incidencias::create($request->all());

        toastr()->success('Empleados created');
        return redirect()->route('incidencias.index');

    
    }
}
