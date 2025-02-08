<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\CharacterSelected;

class TestJob implements ShouldQueue
{
    use Queueable,InteractsWithQueue;


    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        CharacterSelected::dispatch(
            [
                "character_id"=>2,
                "player_id"=>3,
                "match_id"=>4, 
            ]
        );
    }
}
