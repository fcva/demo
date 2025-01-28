<?php

use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Producto\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('/roles', RoleController::class);

Route::resource('/Productos', ProductoController::class);
// Route::resource('/vehiculos', VehiculoController::class);