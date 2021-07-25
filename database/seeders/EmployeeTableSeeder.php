<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert(
            [
                [
                    'firstName',
                    'middleName',
                    'lastName',
                    'address',
                    'jobPosition',
                    'birthDate',
                    'salary',
                    'phoneNumber',
                    'employeePhoto',
                    'branch_id',
                ]
                
        ]
        
    );
    }
}
