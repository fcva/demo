<?php

namespace App\Http\Controllers\Estudiante;

use App\Http\Controllers\Controller;
use App\Http\Resources\EstudianteResource;
use App\Models\Estudiante;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index(Request $request)
    {
        $per_page = request()->get('per_page') ?:6;

        return EstudianteResource::collection(Estudiante::paginate($per_page));
    }

    public function store(Request $request)
    {
        try {
            $request -> validate([
                'nombre'            => 'required',
                'correo'            => 'required',
                'fecha_nacimiento'  => 'required',
                'direccion'         => 'required'
            ]);

            $estudiante = Estudiante::create($request -> all());

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
                'correo'            => 'required',
                'fecha_nacimiento'  => 'required',
                'direccion'         => 'required'
            ]);

            $estudiante = Estudiante::find($id);

            $estudiante -> update($request -> all());

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
            
            $estudiante = Estudiante::find($id);

            $estudiante -> delete();

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
