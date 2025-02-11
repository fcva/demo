<?php

use App\Http\Controllers\Estudiante\EstudianteController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\ProfileController;
use App\Models\Estudiante;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Http\Request;

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

//By Danniels

Route::middleware('auth')->group(function () {

    // Index
    Route::get('/estudiantes/estudiante', function(){
        return Inertia::render('Estudiantes/Estudiante');
    })->name('estudiantes.index');

    //Crear
    Route::get('/estudiantes/create', function () {
        return Inertia::render('Estudiantes/EstudianteCreate');
    })->name('estudiantes.create');

    Route::post('/estudiantes', function (Request $request) {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'fecha_nacimiento' => 'required|date',
            'direccion' => 'nullable|string|max:255'
        ]);
    
        Estudiante::create($validated);
    
        return redirect()->route('estudiantes.index')->with('success', 'Estudiante creado con éxito');
    })->name('estudiantes.store');

    // Show
    Route::get('/estudiantes/estudiante/{id}', function($id){
        $estudiante = Estudiante::findOrFail($id);
    
        return Inertia::render('Estudiantes/EstudianteShow', [
            'estudiante' => $estudiante
        ]);
    })->name('estudiantes.show');

    // Edit
    Route::get('/estudiantes/estudiante/{id}/edit', function($id){
        $estudiante = Estudiante::findOrFail($id);
    
        return Inertia::render('Estudiantes/EstudianteEdit', [
            'estudiante' => $estudiante
        ]);
    })->name('estudiantes.edit');

    Route::put('/estudiantes/estudiante/{id}', function (Request $request, $id) {
        $estudiante = Estudiante::findOrFail($id);
    
        // Validar los datos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'fecha_nacimiento' => 'required|date',
            'direccion' => 'nullable|string|max:255'
        ]);
    
        // Actualizar datos
        $estudiante->update($validated);
    
        // Redireccionar a la lista con un mensaje
        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado con éxito');
    })->name('estudiantes.update');
    
    //Eliminar
    Route::delete('/estudiantes/estudiante/{id}', function ($id) {
        $estudiante = Estudiante::findOrFail($id);
    
        $estudiante->delete();
    
        return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado con éxito');
    })->name('estudiantes.destroy');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
