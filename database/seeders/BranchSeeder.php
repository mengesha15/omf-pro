<?php

namespace Database\Seeders;
use App\Models\Branch;
use App\Models\Employee;
use App\Models\Role;
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

        $roles = DB::table('roles')->get();
        return $roles;
        Branch::factory()->has(Employee::factory()->count(5)->for($roles))->create();
    }
}
