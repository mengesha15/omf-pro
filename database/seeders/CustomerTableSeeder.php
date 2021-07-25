<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CustomerTableSeeder extends Seeder
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
                    'customer_status', // what is the job of this customer
                    'birthDate',
                    'account_balance',
                    'phoneNumber',
                    'branch_id',
                    'account_number',
                    'saving_service_id',
                    'customerPhoto',
                ]
                
        ]
        
    );
    }
}
