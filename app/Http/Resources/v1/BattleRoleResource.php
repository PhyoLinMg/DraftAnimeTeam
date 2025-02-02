<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Role;
use App\Models\Character;
use App\Resources\v1\RoleResource;

class BattleRoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'role'=> Role::find($this->pivot->role_id)->name,
            'role_id'=> $this->pivot->role_id,
            'character_id'=>$this->pivot->character_id,
            'image' => Character::find($this->pivot->character_id)->image,
        ];
    }
}
