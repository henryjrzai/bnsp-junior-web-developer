<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->companyEmail(),
            'position' => fake()->randomElement(['Manager', 'Lead', 'Staff', 'Intern']),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'image' => 'henry-5661111.jpg',
        ];
    }
}
