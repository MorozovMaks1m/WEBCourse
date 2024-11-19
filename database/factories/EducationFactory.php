<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Education>
 */
class EducationFactory extends Factory
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
            'school_name' => fake()->sentence,
            'description' => fake()->realText(500),
            'stage' => fake()->word,
            'gpa' => fake()->randomFloat(2, 4, 5),
            'start_date' => $startDate,
            'end_date' => fake()->optional()->dateTimeBetween($startDate),
        ];
    }
}
