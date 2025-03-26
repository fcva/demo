<?php

namespace App\Http\Controllers\Provider;

use App\Models\Provider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProviderController extends Controller
{
    public function index()
    {
        $providers = Provider::paginate(10);

        return Inertia::render('Providers/Index', [
            'providers' => $providers
        ]);
    }

    public function create()
    {
        return Inertia::render('Providers/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:180',
            'razon_social' => 'nullable|string|max:180',
            'ruc' => 'nullable|string|max:15',
            'telefono' => 'nullable|string|max:15',
            'celular' => 'nullable|string|max:15',
            'direccion' => 'nullable|string|max:150',
            'correo_electronico' => 'nullable|string|email|max:180',
            'descripcion' => 'nullable|string|max:180',
            'observacion' => 'nullable|string|max:120',
            'es_activo' => 'boolean'
        ]);

        Provider::create($request->all());

        return redirect()->route('providers.index')->with('success', 'Proveedor creado exitosamente');
    }

    public function show(Provider $provider)
    {
        return Inertia::render('Providers/Show', ['provider' => $provider]);
    }

    public function edit(Provider $provider)
    {
        return Inertia::render('Providers/Edit', ['provider' => $provider]);
    }

    public function update(Request $request, Provider $provider)
    {
        $request->validate([
            'nombre' => 'required|string|max:180',
            'razon_social' => 'nullable|string|max:180',
            'ruc' => 'nullable|string|max:15',
            'telefono' => 'nullable|string|max:15',
            'celular' => 'nullable|string|max:15',
            'direccion' => 'nullable|string|max:150',
            'correo_electronico' => 'nullable|string|email|max:180',
            'descripcion' => 'nullable|string|max:180',
            'observacion' => 'nullable|string|max:120',
            'es_activo' => 'boolean'
        ]);

        $provider->update($request->all());

        return redirect()->route('providers.index')->with('success', 'Proveedor actualizado exitosamente');
    }

    public function destroy(Provider $provider)
    {
        $provider->delete();

        return redirect()->route('providers.index')->with('success', 'Proveedor eliminado exitosamente');
    }
}
