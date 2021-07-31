<?php

namespace Database\Seeders;
use App\Models\SavingService;
use Illuminate\Database\Seeder;

class SavingServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SavingService::factory(10)->create();
    }
}
