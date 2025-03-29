<?php

namespace App\Http\Controllers\Acl\Role;

use App\Models\Role;
use App\Http\Resources\RoleResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoleController extends Controller
{
    public function index(Request $request) {

        $per_page = request()->get('per_page') ?: 9;

        $role = Role::paginate($per_page);

        return Inertia::render('Acl/Role/Index', [
            'message' => 'hallo friends!',
            'roles' => RoleResource::collection($role)
        ]);
    }

    public function store(Request $request) {

        // return $request->all();

        $request->validate([
            'nombre' => 'required'
        ]);

        $role = Role::create($request->all());

        return back();
    }
}
