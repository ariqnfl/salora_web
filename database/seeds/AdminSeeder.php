<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);
        DB::table('users')->insert([
            'name' => 'mitra1',
            'email' => 'mitra1@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'mitra'
        ]);
    }
}
