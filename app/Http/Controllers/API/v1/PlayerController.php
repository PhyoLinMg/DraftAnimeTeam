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

    public function skip(Request $request)
    {
        try {
            $battleId = $request->battle_id;
            $playerId = $request->player_id;

            if (!$battle = Battle::find($battleId)) {
                return response()->json(['message' => 'Battle not found'], 404);
            }

            $skip = $battle->players()
                ->where('player_id', $playerId)
                ->first()
                ->pivot
                ->skip;

            if ($skip === false) {
                $this->showCharacter();
                $battle->players()->updateExistingPivot($playerId, ['skip' => true]);
            } else {
                return response()->json([
                    'message' => "You cannot skip anymore",
                ], 400); // Changed status code to be more appropriate
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }
    // Request will be role_id, player_id and character_id(random), battle_id
    public function assignCharacterToPlayer(Request $request){

        $validatedData = $request->validate([
            'character_id' => 'required|integer',
            'role_id' => 'required|integer',
            'player_id' => 'required|integer',
            'battle_id' => 'required|integer'
        ]);
    
        // Destructure the validated data for cleaner code
        [$characterId, $roleId, $playerId, $battleId] = [
            $validatedData['character_id'],
            $validatedData['role_id'],
            $validatedData['player_id'],
            $validatedData['battle_id']
        ];

        $battle= Battle::find($battleId);   
        $battle->characters()->attach($characterId, ['role_id'=> $roleId, 'player_id'=> $playerId]);


        //TODO: send websocket broadcast to reflect the UI.

    }

}
