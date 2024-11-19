<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Work>
 */
class WorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = fake()->dateTime; // Generate the start date
        return [
            'company' => fake()->sentence,
            'description' => fake()->realText(500),
            'title' => fake()->sentence,
            'start_date' => $startDate,
            'end_date' => fake()->optional()->dateTimeBetween($startDate),
        ];
    }
}
