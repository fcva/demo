<?php

use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Provider\ProviderController;
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

// Route::get('/roles/index', [RoleController::class, 'index'])->name('roles.index');
// Route::view('/rol', 'roles')->name('rol');

Route::get('/roles/rol', function () {
    return Inertia::render('Roles/Rol');
})->name('roles.rol');

// By Adler
Route::resource('providers', ProviderController::class)->middleware(['auth', 'verified']);
    
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
