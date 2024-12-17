<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Support>
 */
class SupportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

           return [
                'name' => $this->faker->name(),
                'desig' => 'staff', // Static value for designation
                'support' => $this->faker->randomElement(['watchman', 'security', 'cleaner']),
                'gender' => $this->faker->randomElement(['male', 'female']),
                'dob' => $this->faker->date('Y-m-d', '-30 years'), // Ensuring adult age
                'phone' => $this->faker->unique()->phoneNumber(),
                'email' => $this->faker->unique()->safeEmail(),
           ];

    }
}
