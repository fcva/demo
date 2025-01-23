<?php

use App\Http\Controllers\Estudiante\EstudianteController;
use App\Http\Controllers\Role\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// By fcva
Route::resource('/roles', RoleController::class);

Route::resource('/estudiantes', EstudianteController::class);