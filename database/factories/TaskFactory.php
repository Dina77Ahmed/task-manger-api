<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'title'=>$this->faker->unique()->realText($maxChars=20),
        'description'=>$this->faker->unique()->realText($maxChars=70),
        'status' => $this->faker->randomElement(['pending', 'active', 'completed']),
        'priority' => $this->faker->randomElement(['low', 'medium', 'high']),
        'due_date' => $this->faker->dateTimeBetween('now', '+1 month'),
        ];
    }
}
