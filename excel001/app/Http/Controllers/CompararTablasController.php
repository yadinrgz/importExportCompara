<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Emplingresio;
use App\Models\Enrolamiento;
use App\Models\Horarios;



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

    public function horancia()
    {
        // Obtener todos los "empnumber" de la tabla "productos".
        $productosEmpNumbers = Product::all()->pluck('empnumber');
        // Obtener todos los "empnumber_ing" de la tabla "empleadosingresio".
        $empleadosHorario = horarios::all()->pluck('empnumber_ingsio');
 
        // Encontrar las diferencias_hr entre ambos conjuntos de valores.
        $diferencias_hr = $productosEmpNumbers->diff($empleadosHorario);
 
        // Obtener los datos de "productos" para las diferencias_hr.
        $empleadosSinHr = Product::whereIn('empnumber', $diferencias_hr)->get();
 
        // Agregar las columnas "name" y "puesto" a los datos.
        $empleadosSinHr->each(function ($producto) {
            $producto->name = $producto->name;
            $producto->puesto = $producto->puesto;
        });
 
        // Calcular el total de registros comparados.
        $totalRegistrosComparados_Hr = $productosEmpNumbers->count();
 
        // Calcular el total de registros diferentes.
        $totalRegistrosDiferentes_Hr = $diferencias_hr->count();
 
        // Calcular el porcentaje de registros diferentes.
        $porcentajeRegistrosDiferentes_Hr = round(($totalRegistrosDiferentes_Hr / $totalRegistrosComparados_Hr) * 100, 2);

        //
        return view('resultados.horarios', compact(
            'empleadosSinHr',
            'totalRegistrosComparados_Hr',
            'totalRegistrosDiferentes_Hr',
            'porcentajeRegistrosDiferentes_Hr'
        ));

}

    

}
