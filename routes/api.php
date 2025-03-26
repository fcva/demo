<?php

use App\Http\Controllers\Administrator\AdministratorController;
use App\Http\Controllers\Estudiante\EstudianteController;
use App\Http\Controllers\Role\ApiRoleController;
use App\Http\Controllers\Cliente\ClienteController;
use App\Http\Controllers\Producto\ProductoController;
use App\Http\Controllers\Libro\LibroControllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// By fcva
Route::resource('/roles', ApiRoleController::class);