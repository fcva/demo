<?php

use App\Models\Permission;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

	return Permission::get();

    // return view('welcome');
});
