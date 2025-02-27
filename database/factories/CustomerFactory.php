<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'birth_age' => fake()->date(),
            'tel' => '62984963025',
            'inadimplencia' => true,
            'user_id' => User::all()->random()->id
        ];
    }
}
//now()->subYear(10)
