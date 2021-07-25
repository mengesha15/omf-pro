<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApprovedLoanTableSeeder extends Seeder
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
                    'approved_amount',
                    'approved_loan_id',
                    'ruquested_by',
                    'approved_by',
                    'loan_service_id',
                ],
                
        ]
        
    );
    }
}
