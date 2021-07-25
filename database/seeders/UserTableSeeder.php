<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserTableSeeder extends Seeder
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
                    'username',
                    'role',
                    'employee_id',
                    'password',
                ], 
                [
                    'username',
                    'role',
                    'employee_id',
                    'password',
                ],
                [
                    'username',
                    'role',
                    'employee_id',
                    'password',
                ],
                [
                    'username',
                    'role',
                    'employee_id',
                    'password',
                ],      
        ]   
    );
    }
}
