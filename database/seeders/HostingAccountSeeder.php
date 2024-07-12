<?php

namespace Database\Seeders;

use App\Models\HostingAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HostingAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HostingAccount::factory()->count(50)->create();
    }
}
