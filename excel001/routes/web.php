<?php

use App\Http\Controllers\EmplingresioController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CompararTablasController;
use App\Http\Controllers\EnrolamientoController;
use App\Http\Controllers\HorariosController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('welcome');
});

Route::get('/inicio', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
});


Route::resource('products', ProductController::class)->except('show');
Route::get('products/import/index', [MasterController::class, 'importProductIndex'])->name('importProductIndex');
Route::post('products/import', [MasterController::class, 'importProduct'])->name('importProduct');
Route::get('products/export', [MasterController::class, 'exportProduct'])->name('exportProduct');


Route::resource('empleados', EmplingresioController::class)->except('show');
Route::get('empleados/import/index', [MasterController::class, 'importEmpleadoIndex'])->name('importEmpleadoIndex');
Route::post('empleados/import', [MasterController::class, 'importEmpleado'])->name('importEmpleado');
Route::get('empleados/export', [MasterController::class, 'exportEmpleado'])->name('exportEmpleado');

Route::resource('enrolamiento', EnrolamientoController::class)->except('show');
Route::get('enrolamiento/import/index', [MasterController::class, 'importEnrolamientoIndex'])->name('importEnrolamientoIndex');
Route::post('enrolamiento/import', [MasterController::class, 'importEnrolamiento'])->name('importEnrolamiento');



//Route::get('altasybajas', [CompararTablasController::class,'index']);
Route::get('comparancia', [CompararTablasController::class,'comparancia']);

/* Route::get('comparar-tablas', 'CompararTablasController@comparancia')->name('comparar.tablas');
Route::get('exportar-excel', 'CompararTablasController@exportarExcel')->name('exportar.excel');
 */
Route::get('enrolados', [CompararTablasController::class,'enrolados']);
Route::get('/resultados/enrolados', 'EnrolamientoController@index');

/* RUTA DE HORARIOS */
Route::resource('horarios', HorariosController::class)->except('show');

Route::get('horarios/import/index', [MasterController::class, 'importHorariosIndex'])->name('importHorariosIndex');
Route::post('horarios/import', [MasterController::class, 'importHorarios'])->name('importHorarios');

Route::get('horancia', [CompararTablasController::class,'horancia']);
