<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WaktuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('waktus')->insert([
            'waktu' => '13:00',
        ]);
        DB::table('waktus')->insert([
            'waktu' => '14:00',
        ]);
        DB::table('waktus')->insert([
            'waktu' => '15:00',
        ]);
        DB::table('waktus')->insert([
            'waktu' => '16:00',
        ]);
        DB::table('waktus')->insert([
            'waktu' => '17:00',
        ]);
        DB::table('waktus')->insert([
            'waktu' => '18:00',
        ]);
        DB::table('waktus')->insert([
            'waktu' => '19:00',
        ]);
        DB::table('waktus')->insert([
            'waktu' => '20:00',
        ]);
        DB::table('waktus')->insert([
            'waktu' => '21:00',
        ]);
        DB::table('waktus')->insert([
            'waktu' => '22:00',
        ]);
        DB::table('waktus')->insert([
            'waktu' => '23:00',
        ]);
    }
}
