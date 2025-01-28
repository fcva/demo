<?php

namespace App\Http\Controllers\Administrator;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdministratorResource;
use App\Models\Administrator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = request()->get('per_page') ?: 6;
        return AdministratorResource::collection(Administrator::latest()->paginate($per_page));
    }
    public function store(Request $request){
        try {
            $request->validate(
                [
                    'nombres'=>'required',
                    'dni'=>'required',
                    'telefono'=>'required',
                    'nombre_sucursal'=>'required'
                ]);
                $administrator = Administrator::create($request->all());
                $respuesta = [
                    'mensaje'=>'Los datos se han guardado correctamente.',
                ];
                return response()->json($respuesta);
        }catch (ValidationException $excepcion){

            $errors = $excepcion->validator->errors()->getMessages();
            $respuesta=[
                'message'=>'Se ha producido un error.',
                'errors' =>$errors,
            ];
            return response()->json($respuesta);
        }
    }

    public function update($id, Request $request){
        try{
            $request->validate(
            [
                'nombres' =>'required',
                'dni'=>'required',
                'telefono'=>'required',
                'nombre_sucursal'=>'required'
            ]);
            $administrator = Administrator::find($id);
            $administrator->update($request->all());
            $respuesta =[
                'mensaje'=>'Los datos se han actualizado correctamente.',
            ]    ;
                return response()->json($respuesta);
        
            }catch (ValidationException $excepcion){
                $errors = $excepcion->validator->errors()->getMessages();
                $respuesta =[
                    'message'=>'Se ha producido un error',
                    'errors'=>$errors,
                ];
                return response()->json($respuesta);
            }

    }
    public function destroy($id, Request $request){
        try{
            $administrator = Administrator::find($id);
            $administrator->delete();
            $respuesta = [
                'mensaje' => "Los datos se han eliminado correctamente.",
                
            ];
            return response()->json($respuesta);
        }catch (ValidationException $excepcion){
            $errors = $excepcion->validator->errors()->getMessages();

            $respuesta = [
                'message' => 'Se ha producido un error.',
                'errors' => $errors,
            ];

            return response()->json($respuesta);

        }
    }
}
