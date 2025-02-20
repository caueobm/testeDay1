<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->colorName(),
            'category' => 'comedy',
            'age_indication' => '10',
            'duration' => '100',
            'release_date' => fake()->date(),
            'description' => 'Descricao de filmes lalalalal',
            'fan' => fake()->boolean(),
        ];
    }
}
