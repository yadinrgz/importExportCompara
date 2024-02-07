<?php

namespace App\Imports;

use App\Models\Incidencias;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Facades\Excel;

class IncidenciasImport implements ToModel,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!isset($row['0'])) {
            return null;
        }
        return new Incidencias([
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
                

        ]);
    }
    public function startRow(): int
    {
        return 1;
    }



    
}







   