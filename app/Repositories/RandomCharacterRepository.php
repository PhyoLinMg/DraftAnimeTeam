<?php
namespace App\Repositories;

use App\Models\Character;
use App\Models\Battle;

class RandomCharacterRepository{
    public function pickRandomCharacter(int $battleId): Character{
        $battle= Battle::find($battleId);
        $characters= $battle->characters()->get();
        $pivotValues = array_column($characters->toArray(), 'pivot'); 
        $characterIdsPickedByPlayers = array_column($pivotValues, 'character_id'); 

        $randomCharacter= Character::whereNotIn('id',$characterIdsPickedByPlayers)->inRandomOrder()->first();
    
        return $randomCharacter;
    }
}