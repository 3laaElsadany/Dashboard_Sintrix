<?php

namespace Database\Seeders;

use App\Models\HearFromOurHappyCustomer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HearFromOurHappyCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HearFromOurHappyCustomer::factory()
            ->count(15)
            ->create();
    }
}
