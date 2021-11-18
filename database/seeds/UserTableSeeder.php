<?php

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
        DB::table('users')->insert([
            'name' => 'Nepalyan',
            'email' => 'nepalyan@gmail.com',
            'mobile' => '9860073351',
            'address' => 'thimi',
            'is_super_admin' => 1,
            'status' => 1,
            'password' => bcrypt('password'),
        ]);
    }
}
