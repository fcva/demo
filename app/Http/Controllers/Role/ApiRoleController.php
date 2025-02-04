<?php

namespace App\Http\Controllers\Role;

use App\Models\Role;
use App\Http\Resources\RoleResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ApiRoleController extends Controller
{
    public function index(Request $request) {

        $per_page = request()->get('per_page') ?: 6;

        return RoleResource::collection(Role::latest()->paginate($per_page));
    }

    public function store(Request $request) {

        try {
            
            $request->validate([
                'nombre' => 'required'
            ]);

            $role = Role::create($request->all());

            $respuesta = [
                'mensaje' => "Los datos se han guardado correctamente.",
            ];

            return response()->json($respuesta);

        } catch (ValidationException $excepcion) {
            
            $errors = $excepcion->validator->errors()->getMessages();

            $respuesta = [
                'message' => 'Se ha producido un error.',
                'errors' => $errors,
            ];

            return response()->json($respuesta);
        }
    }

    public function update($id, Request $request) {

        try {
            
            $request->validate([
                'nombre' => 'required'
            ]);

            $role = Role::find($id);

            $role->update($request->all());

            $respuesta = [
                'mensaje' => "Los datos se han actualizado correctamente.",
            ];

            return response()->json($respuesta);

        } catch (ValidationException $excepcion) {
            
            $errors = $excepcion->validator->errors()->getMessages();

            $respuesta = [
                'message' => 'Se ha producido un error.',
                'errors' => $errors,
            ];

            return response()->json($respuesta);
        }        
    }

    public function destroy($id, Request $request) {

        try {
            
            $role = Role::find($id);

            $role->delete();

            $respuesta = [
                'mensaje' => "Los datos se han eliminado correctamente.",
            ];

            return response()->json($respuesta);

        } catch (ValidationException $excepcion) {
            
            $errors = $excepcion->validator->errors()->getMessages();

            $respuesta = [
                'message' => 'Se ha producido un error.',
                'errors' => $errors,
            ];

            return response()->json($respuesta);
        }        
    }
}
