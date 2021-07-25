<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class LoanDisburseRecordTableSeeder extends Seeder
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
                    'remaining_amount',
                    'disburse_amount',
                    'branch_id',
                    'borrower_id',
                    'disbursed_by',
                ]
                
        ]
        
    );
    }
}
