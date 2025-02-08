<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BattleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'players'=> $this-> players()->get(),
            'characters'=> BattleRoleResource::collection(resource: $this->characters()->get()),
            'board'=> $this->board()->get()->first()->name,
        ];
    }
}