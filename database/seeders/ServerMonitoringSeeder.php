<?php

namespace Database\Seeders;

use App\Models\ServerMonitoring;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServerMonitoringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServerMonitoring::factory()->count(20)->create();

    }
}
