<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\HostingAccount;
use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HostingAccount>
 */
class HostingAccountFactory extends Factory
{
    protected $model = HostingAccount::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => Client::factory(),
            'plan_id' => Plan::factory(),
            'domain' => $this->faker->domainName,
            'status' => $this->faker->randomElement(['active', 'suspended', 'terminated']),
        ];
    }
}
