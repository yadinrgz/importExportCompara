<?php

namespace App\Imports;

use App\Models\Emplingresio;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class EmplingresioImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Emplingresio([
            'empnumber_ingsio' => $row['0'],
            'name_ingsio' => $row['1'],
        ]);
    }
    public function startRow(): int
    {
        return 1;
    }
    
}


