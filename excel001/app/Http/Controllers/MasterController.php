<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use App\Imports\EnrolamientoImport;
use App\Imports\EmplingresioImport;
use App\Imports\HorariosImport;
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
  
    public function importEnrolamientoIndex()
    {
        return view('enrolamiento.import');
    }
  
    public function importHorariosIndex()
    {
        return view('horarios.import');
    }
  
    ///////////////////////////////////////////////////

    public function importProduct(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        $file = $request->file('file');

        Excel::import(new ProductsImport, $file);
        toastr()->success('Empleados importados con éxito');
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
        toastr()->success('Empleados importados con éxito');
        return redirect()->route('empleados.index');
    }
/* FUNCION IMPORTAR ENROLAMIENTOS */
    public function importEnrolamiento(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        $file = $request->file('file');

        Excel::import(new HorariosImport, $file);
        toastr()->success('Empleados importados con éxito');
        return redirect()->route('enrolamiento.index');
    }

/* FUNCION IMPORTAR ENROLAMIENTOS */
public function importHorarios(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls,csv',
    ]);

    $file = $request->file('file');

    Excel::import(new HorariosImport, $file);
    toastr()->success('Empleados importados con éxito');
    return redirect()->route('horarios.index');
}





    public function exportProduct()
    {
        return Excel::download(new ProductsExport, 'products_' . now()->toDateTimeString() . '.xlsx');
    }

}