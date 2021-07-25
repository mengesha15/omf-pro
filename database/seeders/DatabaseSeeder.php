<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(
           [
               AccountTableSeeder::class,
               ApprovedLoanTableSeeder::class,
               BorrowerTableSeeder::class,
               BranchTableSeeder::class,
               CustomerTableSeeder::class,
               EmployeeTableSeeder::class,
               LoanDisburseRecordTableSeeder::class,
               LoanServiceTableSeeder::class,
               RequestedLoanTableSeeder::class,
               SavingServiceTableSeeder::class,
               SavingTransactionTableSeeder::class,
               UserTableSeeder::class,
    ]);
    }
}
