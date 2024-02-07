<?php

namespace App\Imports;

use App\Models\Prot;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProtImport implements ToModel, WithStartRow
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

        return new Prot([

            'clave' => $row['0'],
            'lector' => $row['1'],
            'nombre_lector' => $row['2'],
            'serie' => $row['3'],
            'host' => $row['4'],
            'ip' => $row['5'],
            'terminal' => $row['6'],
            'puerto' => $row['7'],



            //
        ]);
    }
    public function startRow(): int
    {
        return 1;
    }

}
