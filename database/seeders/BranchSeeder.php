<?php

namespace Database\Seeders;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\User;
use App\Models\Borrower;
use App\Models\LoanService;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Branch::factory(4)->has(Employee::factory()->count(2)->has(User::Factory()->count(1)))->create();
    }
}
