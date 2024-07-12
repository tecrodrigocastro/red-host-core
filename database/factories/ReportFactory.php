<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    protected $model = Report::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => Client::factory(),
            'type' => $this->faker->randomElement(['usage', 'billing', 'support']),
            'data' => json_encode([
                'example_key' => $this->faker->word,
                'example_value' => $this->faker->randomNumber,
            ]),
        ];
    }
}
