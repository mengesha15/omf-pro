<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LoanService;
class LoanServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LoanService::factory(8)->create();
    }
}
