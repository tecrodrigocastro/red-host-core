<?php

namespace Database\Factories;

use App\Models\ServerMonitoring;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServerMonitoring>
 */
class ServerMonitoringFactory extends Factory
{
    protected $model = ServerMonitoring::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'server_name' => $this->faker->domainWord,
            'cpu_usage' => $this->faker->numberBetween(1, 100),
            'ram_usage' => $this->faker->numberBetween(1000, 32000), // in MB
            'disk_usage' => $this->faker->numberBetween(1000, 1000000), // in MB
        ];
    }
}
