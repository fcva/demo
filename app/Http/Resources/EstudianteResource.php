<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EstudianteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                    => $this->id,
            'nombre'                => $this->nombre,
            'correo'                => $this->correo,
            'fecha_nacimiento'      => $this->fecha_nacimiento,
            'direccion'             => $this->direccion,
        ];
    }
}
