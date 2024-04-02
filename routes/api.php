<?php

use App\Http\Controllers\EmpresaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;

Route::apiResource('/productos', ProductoController::class);
Route::apiResource('/proveedores', ProveedorController::class);
Route::apiResource('/empresas', EmpresaController::class);


