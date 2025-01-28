<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LibroResource extends jsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'titulo'        => $this->titulo,
            'autor'         => $this->autor,
            'editorial'     => $this->editorial,
            'anio_publicacion' => $this->anio_publicacion,
            'paginas'       => $this->paginas,
            'resumen'       => $this->resumen,
        ];
    }
}