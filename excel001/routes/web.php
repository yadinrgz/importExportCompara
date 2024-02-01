<?php

use App\Http\Controllers\EmplingresioController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CompararTablasController;
use App\Models\Emplingresio;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::resource('products', ProductController::class)->except('show');
Route::get('products/import/index', [MasterController::class, 'importProductIndex'])->name('importProductIndex');
Route::post('products/import', [MasterController::class, 'importProduct'])->name('importProduct');
Route::get('products/export', [MasterController::class, 'exportProduct'])->name('exportProduct');


Route::resource('empleados', EmplingresioController::class)->except('show');
Route::get('empleados/import/index', [MasterController::class, 'importEmpleadoIndex'])->name('importEmpleadoIndex');
Route::post('empleados/import', [MasterController::class, 'importEmpleado'])->name('importEmpleado');
Route::get('empleados/export', [MasterController::class, 'exportEmpleado'])->name('exportEmpleado');

//Route::resource('resultados', CompararTablasController::class)->except('show');


Route::get('altasybajas', [CompararTablasController::class,'index']);

Route::get('comparancia', [CompararTablasController::class,'comparancia']);
