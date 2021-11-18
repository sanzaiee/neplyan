<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role_name' => 'Admin',
            'role_description' => 'Admin User',
            'status' => 1
        ]);
        DB::table('roles')->insert([
            'role_name' => 'Client',
            'role_description' => 'Client User',
            'status' => 1
        ]);
    }
}
