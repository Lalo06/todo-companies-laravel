<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use App\Models\Company;

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

    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'name' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'user_id' => User::factory(),
            'company_id' => Company::factory(),
            'is_completed' => fake()->boolean(),
            'start_at' => fake()->dateTimeBetween('-1 week', 'now'),
            'expired_at' => fake()->dateTimeBetween('now', '+1 week'),
        ];
    }
}
