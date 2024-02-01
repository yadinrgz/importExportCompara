<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
/* use Maatwebsite\Excel\Concerns\WithHeadingRow; */

class ProductsImport implements ToModel, WithStartRow  /* , WithHeadingRow */

{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Product([
            'empnumber' => $row['0'],
            'name' => $row['1'],
            'grupo' => $row['2'],
            'puesto' => $row['3'],
        ]);
    }

    public function startRow(): int
    {
        return 1;
    }
}