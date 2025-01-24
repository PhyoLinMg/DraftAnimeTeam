<?php
namespace App\Repositories;

use App\Models\Character;
use App\Models\Battle;
use App\Models\Anime;
use App\Enums\BoardType;

class RandomCharacterRepository{
    public function pickRandomCharacter(int $battleId): Character{
        $battle= Battle::find($battleId);
        $board= $battle->board;
        $characters= $battle->characters()->get();
        $pivotValues = array_column($characters->toArray(), 'pivot'); 
        $characterIdsPickedByPlayers = array_column($pivotValues, 'character_id'); 
        
        if($board->type== BoardType::All){
            $randomCharacter= Character::whereNotIn('id',$characterIdsPickedByPlayers)->inRandomOrder()->first();
        }
        else{
            $animes= Anime::whereIn('name',['One Piece','Bleach','Naruto']);
            $randomCharacter= $animes->characters()->whereNotIn('id',$characterIdsPickedByPlayers)->inRandomOrder()->first();
        }

        // for all character 
    
        return $randomCharacter;
    }
}