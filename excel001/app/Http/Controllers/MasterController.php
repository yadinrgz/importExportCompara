<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use App\Imports\EnrolamientoImport;
use App\Imports\EmplingresioImport;
use App\Imports\HorariosImport;
use App\Imports\IncidenciasImport;
use App\Imports\ProtImport;
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
    public function importIncidenciasIndex()
    {
        return view('incidencias.import');
    }
  
    public function importProtIndex()
    {
        return view('lectores.import');
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

/* FUNCION IMPORTAR HORARIOS */
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
/* FUNCION IMPORTAR LE4CVTOREDS */
public function importProt(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls,csv',
    ]);

    $file = $request->file('file');

    Excel::import(new ProtImport, $file);
    toastr()->success('Empleados importados con éxito');
    return redirect()->route('lectores.index');
}

/* FUNCION IMPORTAR INCIDENCIAS */
public function importIncidencias(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls,csv',
    ]);

    $file = $request->file('file');
    $data = Excel::toArray($file);
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


    Excel::import(new IncidenciasImport, $file);

    toastr()->success('Empleados created');
    return redirect()->route('incidencias.index');

   /*  Excel::import(new IncidenciasImport, $file);
    toastr()->success('Incidencias importados con éxito');
    return redirect()->route('incidencias.index'); */
}





    public function exportProduct()
    {
        return Excel::download(new ProductsExport, 'products_' . now()->toDateTimeString() . '.xlsx');
    }

}