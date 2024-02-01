<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use App\Imports\EmplingresioImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MasterController extends Controller
{
    public function importProductIndex()
    {
        return view('products.import');
    }
    public function importEmpleadoIndex()
    {
        return view('empleados.import');
    }

    ///////////////////////////////////////////////////

    public function importProduct(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        $file = $request->file('file');

        Excel::import(new ProductsImport, $file);
        toastr()->success('Products imported');
        return redirect()->route('products.index');
    }

/* FUNCION IMPORTAR EMPLEADO */
    public function importEmpleado(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        $file = $request->file('file');

        Excel::import(new EmplingresioImport, $file);
        toastr()->success('Empleados imported');
        return redirect()->route('empleados.index');
    }


    public function exportProduct()
    {
        return Excel::download(new ProductsExport, 'products_' . now()->toDateTimeString() . '.xlsx');
    }

}