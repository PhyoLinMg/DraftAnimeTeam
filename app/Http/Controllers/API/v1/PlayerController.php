<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\CharacterResource;
use Illuminate\Http\Request;
use App\Models\Battle;
use App\Repositories\RandomCharacterRepository;

class PlayerController extends Controller
{
    protected $randomCharacterRepository;
    public function __construct(RandomCharacterRepository $randomCharacterRepository) {
        $this->randomCharacterRepository = $randomCharacterRepository;
    }
    //
    public function showCharacter(){
        return new CharacterResource($this->randomCharacterRepository->pickRandomCharacter(1));
    } 

    public function skip(Request $request){
        
    }
    // Request will be role_id, player_id and character_id(random), battle_id
    public function assignCharacterToPlayer(Request $request){
        $characterId = $request->character_id;
        $roleId= $request->role_id;
        $playerId= $request->player_id;
        $battleId= $request->battle_id;

        $battle= Battle::find($battleId);   
        $battle->characters()->attach($characterId, ['role_id'=> $roleId, 'player_id'=> $playerId]);


        //TODO: send websocket broadcast to reflect the UI.

    }

}
