<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleIndexController extends Controller
{
    public function __invoke() {

        return inertia()->render('Roles/Index', [
            'saludo' => 'Hola desde RoleIndexController'
        ]);
    }
}
