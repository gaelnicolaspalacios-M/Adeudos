<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdeudoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'no_de_control' => $this->no_de_control,
            'tipo'          => $this->tipo,
            'periodo'       => $this->periodo,
            'laboratorio'   => $this->laboratorio,
            'costo'         => $this->costo,
            'fecha'         => $this->fecha,
            'descripcion'   => $this->descripcion,
            'clave_area'    => $this->clave_area,
            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ];
    }
}

