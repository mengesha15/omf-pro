<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BorrowerTableSeeder extends Seeder
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
                    'birthDate',
                    'phoneNumber',
                    'borrower_status',
                    'borrowed_amount',
                    'user_id',
                    'branch_id',
                    'loan_service_id',
                    'borrowerPhoto',
                ]
                
        ]
        
    );
    }
}
