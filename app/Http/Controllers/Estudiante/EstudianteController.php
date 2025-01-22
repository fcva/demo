<?php

namespace App\Http\Controllers\Estudiante;

use App\Http\Controllers\Controller;
use App\Http\Resources\EstudianteResource;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index(Request $request)
    {
        $per_page = request()->get('per_page') ?:6;

        return EstudianteResource::collection(Estudiante::paginate($per_page));
    }
}
