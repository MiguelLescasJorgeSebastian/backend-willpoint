<?php

use App\Http\Controllers\EmpresaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;

Route::resource('/productos', ProductoController::class);
Route::resource('/proveedores', ProveedorController::class);
Route::resource('/empresas', EmpresaController::class);


