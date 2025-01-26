<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdministratorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return 
        [
            'id'                =>$this->id,
            'nombres'           =>$this->nombres,
            'dni'               =>$this->telefono,
            'nombre_sucursal'   =>$this->nombre_sucursal,
        ];
    }
}
