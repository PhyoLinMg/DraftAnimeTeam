<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CharacterSelected implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $characterId;
    public $playerId;
    public $matchId;

    public function __construct($characterId, $playerId, $matchId)
    {
        $this->characterId = $characterId;
        $this->playerId = $playerId;
        $this->matchId = $matchId;
    }

    public function broadcastOn()
    {
        return new Channel('characters.selection');
    }

    public function broadcastWith()
    {
        return [
            'character_id' => $this->characterId,
            'player_id' => $this->playerId,
            'match_id' => $this->matchId,
            // Add any other relevant data
        ];
    }
}