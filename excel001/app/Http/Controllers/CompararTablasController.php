<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Emplingresio;
use App\Models\Enrolamiento;





class CompararTablasController extends Controller
{
    public function enrolados()
    {
        $enrolamientos = Enrolamiento::where('rostro_bio', 0)->get();
        $productosEmpNumbers = Product::all()->pluck('empnumber');
       
        $totalRegistrosIngresados = $productosEmpNumbers->count();
        $totalRegistrosNoBio = $enrolamientos->count();
       
        $porcentajeRegistrosFaltantes = round(($totalRegistrosNoBio / $totalRegistrosIngresados) * 100, 2);

      
        return view('resultados.enrolados', compact('enrolamientos', 'totalRegistrosIngresados', 'totalRegistrosNoBio','porcentajeRegistrosFaltantes'));
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

        return view('resultados.compare', compact(
            'productosConDiferencias',
            'totalRegistrosComparados',
            'totalRegistrosDiferentes',
            'porcentajeRegistrosDiferentes'
        ));
    }

    

}
