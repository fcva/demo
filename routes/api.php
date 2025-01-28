<?php

use App\Http\Controllers\Administrator\AdministratorController;
use App\Http\Controllers\Estudiante\EstudianteController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Cliente\ClienteController;
use App\Http\Controllers\Producto\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// By fcva
Route::resource('/roles', RoleController::class);

// By Danniels
Route::resource('/estudiantes', EstudianteController::class);

// By Kenny
Route::resource('/clientes', ClienteController::class);

// By Jeferson
Route::resource('/productos', ProductoController::class);

// By Adler
Route::resource('/administrator', AdministratorController::class);
