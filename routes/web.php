<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('dashboard')->group(function(){

      Route::get('producto',[ProductoController::class,'index'])->name('producto.index');
      Route::get('producto/create',[ProductoController::class,'create'])->name('producto.create');
      Route::post('producto',[ProductoController::class,'store'])->name('producto.store');
      Route::delete('producto/{id}',[ProductoController::class,'destroy'])->name('producto.destroy');
        Route::get('producto/{id}/edit',[ProductoController::class,'edit'])->name('producto.edit');
        Route::put('producto/{id}',[ProductoController::class,'update'])->name('producto.update');

});

require __DIR__.'/auth.php';
