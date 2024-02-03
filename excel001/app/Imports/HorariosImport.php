<?php

namespace App\Imports;

use App\Models\Horarios;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class HorariosImport implements ToModel, WithStartRow
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

        return new Horarios([
            'numbemp_hr' => $row['0'],
             ]);
    
    }
    public function startRow(): int
    {
        return 1;
    }

    
    
}


