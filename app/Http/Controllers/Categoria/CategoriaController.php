<?php

namespace App\Http\Controllers\Categoria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        return response()->json(Categoria::all());
    }

    public function show($id)
    {
        return response()->json(Categoria::findOrFail($id));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:180',
            'descripcion' => 'nullable|string|max:180',
            'observacion' => 'nullable|string|max:120',
            'es_activo' => 'boolean',
        ]);

        $categoria = Categoria::create($data);
        return response()->json($categoria, 201);
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);

        $data = $request->validate([
            'nombre' => 'sometimes|string|max:180',
            'descripcion' => 'nullable|string|max:180',
            'observacion' => 'nullable|string|max:120',
            'es_activo' => 'boolean',
        ]);

        $categoria->update($data);
        return response()->json($categoria);
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return response()->json(['message' => 'Categoría eliminada']);
    }

    public function restore($id)
    {
        $categoria = Categoria::withTrashed()->findOrFail($id);
        $categoria->restore();
        return response()->json(['message' => 'Categoría restaurada', 'categoria' => $categoria]);
    }
}
