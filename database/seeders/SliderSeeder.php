<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n = [
            ['image'=>'seeder/s1.jpg'],
            ['image'=>'seeder/s2.jpg'],
        ];

        DB::table('sliders')->insert($n);
    }
}
