<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Player;
use App\Models\Battle;
use Illuminate\Database\Eloquent\Factories\Sequence;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Battle::factory(1)->hasAttached(Player::factory()->count(2)
        ->state(new Sequence(
            ['player_type'=> 'player_one'],
            ['player_type'=> 'player_two']
        ))
        )->create();                            
    }
}
