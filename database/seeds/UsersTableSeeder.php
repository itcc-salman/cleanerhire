<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Superadmin',
            'last_name' => '',
            'email' => 'admin@itccdigital.com',
            'role' => 'superadmin',
            'password' => Hash::make('123456'),
            'status' => 1
        ]);
    }
}
