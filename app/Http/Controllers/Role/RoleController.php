<?php

namespace App\Http\Controllers\Role;

use App\Models\Role;
use App\Http\Resources\RoleResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request) {

        $per_page = request()->get('per_page') ?: 6;

        return RoleResource::collection(Role::paginate($per_page));
    }
}
