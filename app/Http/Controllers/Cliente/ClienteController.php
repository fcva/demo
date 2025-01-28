<?php

namespace App\Http\Controllers\Cliente;

use App\Models\Cliente;
use App\Http\Resources\ClienteResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $per_page = request()->get('per_page') ?: 6;

        return ClienteResource::collection(Cliente::paginate($per_page));
    }

    public function store(Request $request)
    {
        try {
            $request -> validate([
                'nombre'           => 'required',
                'apellido'         => 'required',
                'edad'             => 'required',
                'telefono'         => 'required',
                'correo'           => 'required'
            ]);

            $cliente = Cliente::create($request -> all());

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

    public function show(Cliente $cliente)
    {
        return response()->json([
            'success' => true,
            'message' => 'Cliente encontrado.',
            'data' => new ClienteResource($cliente)
        ]);
    }

    public function update($id, Request $request)
    {
        try {
            
            $request -> validate([
                'nombre'           => 'required',
                'apellido'         => 'required',
                'edad'             => 'required',
                'telefono'         => 'required',
                'correo'           => 'required'
            ]);

            $cliente = Cliente::find($id);

            $cliente -> update($request -> all());

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
            
            $cliente = Cliente::find($id);

            $cliente -> delete();

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
