<?php

namespace App\Imports;

use App\Models\Enrolamiento;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class EnrolamientoImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!isset($row['2'])) {
            return null;
        }

        return new Enrolamiento([
            'numbemp_bio' => $row['0'],
            'name_bio' => $row['1'],
            'rostro_bio' => $row['6'],
        ]);
    
    }
    public function startRow(): int
    {
        return 3;
    }

    
    
}


