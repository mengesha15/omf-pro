<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SavingTransactionTableSeeder extends Seeder
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
                    'withdrawals',
                    'deposits',
                    'customer_id',
                    'branch_id',
                    'made_by',
                ]
                
        ]
        
    );
    }
}
