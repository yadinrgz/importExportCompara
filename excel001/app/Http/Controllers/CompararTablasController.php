<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Emplingresio;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CompararTablasController extends Controller
{
    public function index()
    {
        // Obtenemos los datos de las tablas
        $emplingresos = Emplingresio::all();
        $productos = Product::all();

        // Comparamos los datos de las columnas "empnumber_ingsio" y "empnumber"
        $diferencias = [];
        foreach ($emplingresos as $emplingreso) {
            $empnumber_ingreso = $emplingreso->empnumber_ingsio;
            foreach ($productos as $producto) {
                $empnumber_producto = $producto->empnumber;
                if ($empnumber_ingreso != $empnumber_producto) {
                    $diferencias[] = [
                        'empnumber_ingreso' => $empnumber_ingreso,
                        'empnumber_producto' => $empnumber_producto,
                    ];
                }
            }
        }

        // Devolvemos la vista con los resultados
        return view('resultados.altasbajas', [
            'diferencias' => $diferencias,
        ]);
    }
    


    //todos los registros de la tabla
    public function comparancia()
    { 
 // Obtener todos los "empnumber" de la tabla "productos".
 $productosEmpNumbers = Product::all()->pluck('empnumber');

 // Obtener todos los "empnumber_ing" de la tabla "empleadosingresio".
 $empleadosIngresosEmpNumbers = Emplingresio::all()->pluck('empnumber_ingsio');

 // Encontrar las diferencias entre ambos conjuntos de valores.
 $diferencias = $productosEmpNumbers->diff($empleadosIngresosEmpNumbers);

 // Obtener los datos de "productos" para las diferencias.
 $productosConDiferencias = Product::whereIn('empnumber', $diferencias)->get();

 // Agregar las columnas "name" y "puesto" a los datos.
 $productosConDiferencias->each(function ($producto) {
     $producto->name = $producto->name;
     $producto->puesto = $producto->puesto;
 });

// Calcular el total de registros comparados.
$totalRegistrosComparados = $productosEmpNumbers->count();

// Calcular el total de registros diferentes.
$totalRegistrosDiferentes = $diferencias->count();

// Calcular el porcentaje de registros diferentes.
$porcentajeRegistrosDiferentes = round(($totalRegistrosDiferentes / $totalRegistrosComparados) * 100, 2);



return view('resultados.compare', compact('productosConDiferencias',
'totalRegistrosComparados',
'totalRegistrosDiferentes',
'porcentajeRegistrosDiferentes'));
}



}
    
    
    

