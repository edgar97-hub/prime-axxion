<?php

namespace App\Http\Resources\Help;

use Illuminate\Http\Resources\Json\JsonResource;

class HelpResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
      return [
        'id'          => $this->id,
        'pregunta'    => $this->question,
        'respuesta'   => $this->answer,
      ];
    }
}
