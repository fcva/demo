<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Producto;
use Illuminate\Auth\Events\Validated;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

use function Psy\bin;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $producto=Producto::with('categoria')->get();
      return inertia::render('Producto/Index',['productos'=>$producto]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoria=DB::table('categorias')->get();
        return Inertia::render('Producto/Create',['categorias'=>$categoria]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            //validar datos
          $request->validate([
            'nombre'=>'required',
            'marca'=>'required',
            'modelo'=>'required',
            'color'=>'required',
            'dimension'=>'required',
            'descripcion'=>'required',
            'observacion'=>'required',
            'es_activo'=>'required',
            'categoria_id'=>'required'
          ]);
            //guardar datos
            $producto=Producto::created($request->all());
            //redireccionar
            return redirect()->route('producto.index')->with('success','producto creado');
        } catch(QueryException $e){
            return back()->withErrors(['error'=>'Error al crear el producto'.$e->getMessage()]);
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto=Producto::findOrfail($id);
        return Inertia::render('Producto/Edit',['producto'=>$producto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->Validate([
            'nombre'=>'required',
            'marca'=>'required',
            'modelo'=>'required',
            'color'=>'required',
            'dimension'=>'required',
            'descripcion'=>'required',
            'observacion'=>'required',
            'es_activo'=>'required',
            'categoria_id'=>'required'
          ]);
          $producto=Producto::findOrfail($id);
          $producto->update([
            'nombre'=>$request->nombre,
            'marca'=>$request->marca,
            'modelo'=>$request->modelo,
            'color'=>$request->color,
            'dimension'=>$request->dimension,
            'descripcion'=>$request->descripcion,
            'observacion'=>$request->observacion,
            'es_activo'=>$request->es_activo,
            'categoria_id'=>$request->categoria_id
          ]);
          return redirect()->route('producto.index')->with('success','producto actualizado');
         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $producto=Producto::find($id);
        if (!$producto) {
            return response()->json(['error' => 'Medicamento no encontrado.'], 404);
        }
    
        try {
            $producto->delete();
            return response()->json(['message' => 'Medicamento eliminado correctamente.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar: ' . $e->getMessage()], 500);
        }
    
    }
}
