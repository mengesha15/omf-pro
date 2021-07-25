<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RequestedLoanTableSeeder extends Seeder
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
                    'requesed_amount',
                    'borrower_id',
                    'ruquested_by',
                    'approved_by',
                    'loan_service_id',
                ]
                
        ]
        
    );
    }
}
