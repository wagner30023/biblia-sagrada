<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IdiomaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    // public static $wrap  = 'idioma';

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'versoes' => new VersoesCollection($this->whenLoaded('versoes')),
            'links' => [
                'rel' => 'Alterar um idioma',
                'type' => 'PUT',
                'link' => route('idioma.update', $this->id)
            ],
            [
                'rel' => 'Excluir um idioma',
                'type' => 'DELETE',
                'link' => route('idioma.destroy', $this->id)
            ]
        ];
    }
}
