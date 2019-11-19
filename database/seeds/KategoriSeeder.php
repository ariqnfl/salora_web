<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
            'kategori' => 'Futsal',
        ]);
        DB::table('kategoris')->insert([
            'kategori' => 'Basket',
        ]);
        DB::table('kategoris')->insert([
            'kategori' => 'Sepak Bola',
        ]);
        DB::table('kategoris')->insert([
            'kategori' => 'Badminton',
        ]);
    }
}
