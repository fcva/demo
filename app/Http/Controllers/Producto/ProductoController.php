<?php

namespace App\Http\Controllers\Producto;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductoResource;
use App\Models\Productos;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;


class ProductoController extends Controller
{
    //
    
    public function index(Request $request)
    {
        $per_page = request()->get('per_page') ?:6;

        return ProductoResource::collection(Productos::paginate($per_page));
    }

    public function store(Request $request)
    {
        try {
            $request -> validate([
                'nombre'            => 'required',
                'descripcion'       => 'required',
                'precio'            => 'required'
                
            ]);

            $producto = Productos::create($request -> all());

            $respuesta = [
                'mensaje' => "Los datos fueron guardados correctamente."
            ];

            return response() -> json($respuesta);

        } catch (ValidationException $excepcion) {
            
            $errors = $excepcion->validator->errors()->getMessages();
            
            $respuesta = [
                'message' => 'Se ha producido un error.',
                'errors' => $errors,
            ];

            return response()->json($respuesta);
        }
    }

    public function update($id, Request $request)
    {
        try {
            
            $request -> validate([
                'nombre'            => 'required',
                'descripcion'       => 'required',
                'precio'            => 'required'
            ]);

            $producto = Productos::find($id);

            $producto -> update($request -> all());

            $respuesta = [
                'mensaje' => "Los datos se han actualizado correctamente.",
            ];

            return response() -> json($respuesta);

        } catch (ValidationException $excepcion) {
            
            $errors = $excepcion->validator->errors()->getMessages();

            $respuesta = [
                'message' => 'Se ha producido un error.',
                'errors' => $errors,
            ];

            return response() -> json($respuesta);

        }
    }

    public function destroy($id, Request $request)
    {
        try {
            
            $producto = Productos::find($id);

            $producto -> delete();

            $respuesta = [
                'mensaje' => "Los datos se han eliminado correctamente.",
            ];

            return response() -> json($respuesta);

        } catch (ValidationException $excepcion) {
            
            $errors = $excepcion->validator->errors()->getMessages();

            $respuesta = [
                'message' => 'Se ha producido un error',
                'errors' => $errors,
            ];

            return response()->json($respuesta);

        }
    }
}
