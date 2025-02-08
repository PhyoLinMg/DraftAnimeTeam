<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Battle;
use App\Models\Character;

class BattleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Battle::factory(10)->
        hasAttached(
            Character::factory()->count(6),
            ['player_id'=> 1,
            'role_id'=>2,
            ]
        )->create();

    }
}
