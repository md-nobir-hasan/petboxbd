<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n = [
            ['c_name' => 'Blue','c_code' => '#032ff9'],
            ['c_name' => 'Green','c_code' => '#03f91b'],
            ['c_name' => 'Yellow','c_code' => '#f9f603'],
        ];

        DB::table('product_colors')->insert($n);
    }
}
