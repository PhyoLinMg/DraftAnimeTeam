<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Board>
 */
class BoardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'role_1' => 'Captain',
            'role_2' => 'Vice Captain',
            'role_3' => 'Healer',
            'role_4' => 'Tank',
            'role_5' => 'Support',
            'role_6' => 'Support',
        ];
    }
}
