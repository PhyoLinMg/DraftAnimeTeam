<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Anime;
use App\Models\Character;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            RoleSeeder::class,
            PlayerSeeder::class,
            AnimeCharacterSeeder::class,
            MatchQueueSeeder::class,
            BattleSeeder::class,
        ]);
    }
}
