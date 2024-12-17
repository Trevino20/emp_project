<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
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
            'desig' => 'student', // Fixed value for designation
            'gender' => $this->faker->randomElement(['male', 'female']),
            'class' => $this->faker->numberBetween(1, 10), 
            'dob' => $this->faker->date('Y-m-d', '-10 years'), 
            'phone' => $this->faker->unique()->phoneNumber(), 
            'email' => $this->faker->unique()->safeEmail(),
            
        ];
    }
}
