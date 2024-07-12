<?php

namespace Database\Factories;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    protected $model = Plan::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word . ' Plan',
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 5, 100),
            'disk_space' => $this->faker->numberBetween(1000, 100000), // in MB
            'bandwidth' => $this->faker->numberBetween(1000, 100000), // in MB
            'email_accounts' => $this->faker->numberBetween(1, 100),
        ];
    }
}
