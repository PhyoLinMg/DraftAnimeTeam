<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MatchMakingQueue;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Enums\Status;
use App\Models\Battle;
use App\Models\Player;

class MatchMakingQueueController extends Controller
{
    //
    public function create(Request $request)
{
    try {
        // Validate the incoming request
        $validatedData = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:3', 'max:255']
        ])->validate();

        // Create new queue entry
        $queue = MatchMakingQueue::create([
            'player_name' => $validatedData['name'],
            'status' => 'pending'
        ]);

        // Return success response
        return response()->json([
            'message' => 'Player successfully added to queue',
            'data' => [
                'id' => $queue->id,
                'player_name' => $queue->player_name,
                'status' => $queue->status
            ],
            'status' => 'success'
        ], 201);

    } catch (\Illuminate\Validation\ValidationException $e) {
        // Return validation error response
        return response()->json([
            'message' => 'Validation errors',
            'errors' => $e->validator->errors(),
            'status' => 'error'
        ], 422);
    } catch (\Exception $e) {
        // Return generic error response for unexpected exceptions
        return response()->json([
            'message' => 'An unexpected error occurred while processing your request',
            'status' => 'error'
        ], 500);
    }
}
    public function match()
    {
        try {
            $pendings = MatchMakingQueue::where('status', 'pending')->get();

            if ($pendings->isEmpty()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No pending matches found',
                    'data' => null
                ], 404);
            }

            if ($pendings->count() % 2 != 0) {
                $pendings->pop();
            }

            $matches = [];
            //TODO: send the websocket broadcast to the players who are waiting for the queue.

            for ($x = 0; $x < $pendings->count(); $x += 2) {
                // Update status for both players
                $pendings[$x + 1]->status = Status::BestMatch;
                $pendings[$x + 1]->save();
                $pendings[$x]->status = Status::BestMatch;
                $pendings[$x]->save();

                // Create battle and players
                $battle = Battle::create(['board_id' => 1]);

                $player1 = Player::create([
                    'player_type' => 'player_one',
                    'name' => $pendings[$x]->player_name
                ]);

                $player2 = Player::create([
                    'player_type' => 'player_two',
                    'name' => $pendings[$x + 1]->player_name
                ]);

                $battle->players()->attach([$player1->id, $player2->id]);

                // Add match information to response array
                $matches[] = [
                    'battle_id' => $battle->id,
                    'player1' => [
                        'id' => $player1->id,
                        'name' => $player1->name
                    ],
                    'player2' => [
                        'id' => $player2->id,
                        'name' => $player2->name
                    ]
                ];
            }

            return response()->json([
                'status' => 'success',
                'message' => count($matches) . ' matches created successfully',
                'data' => [
                    'matches' => $matches,
                    'total_matches' => count($matches)
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create matches: ' . $e->getMessage(),
                'data' => null
            ], 500);
        }
    }
}
