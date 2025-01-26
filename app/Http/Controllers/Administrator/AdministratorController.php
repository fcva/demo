<?php

namespace App\Http\Controllers\Administrator;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdministratorResource;
use App\Models\Administrator;
use Illuminate\Http\Request;



class AdministratorController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = request()->get('per_page') ?: 6;
        return AdministratorResource::collection(Administrator::paginate($per_page));
    }
}
