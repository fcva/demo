<?php

// use App\Http\Controllers\Administrator\AdministratorController;

use App\Http\Controllers\Administrator\AdministratorController;
use App\Http\Controllers\Estudiante\EstudianteController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Cliente\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// By fcva
Route::resource('/roles', RoleController::class);

// By Danniels
Route::resource('/estudiantes', EstudianteController::class);

Route::resource('/clientesss', ClienteController::class);
// Route::resource('/vehiculos', VehiculoController::class);


// By Adler
Route::resource('/administrator', AdministratorController::class);
//-----