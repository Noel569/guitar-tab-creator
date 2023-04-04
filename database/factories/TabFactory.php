<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tab>
 */
class TabFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(2),
            'performer' => fake()->name(),
            'user_id' => 1,
            'tuning_id' => 1,
            'tempo' => rand(120, 140),
            'tab' => ""
        ];
    }
}
