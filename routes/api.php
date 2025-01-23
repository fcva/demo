<?php

use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Cliente\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('/roles', RoleController::class);

Route::resource('/clientes', ClienteController::class);
// Route::resource('/vehiculos', VehiculoController::class);