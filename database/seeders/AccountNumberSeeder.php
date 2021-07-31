<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AccountNumber;

class AccountNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // To create seed with foreign key
        // User::factory(8)->has( Post::factory()->count(5))->create();
        AccountNumber::factory(20)->create();
    }
}
