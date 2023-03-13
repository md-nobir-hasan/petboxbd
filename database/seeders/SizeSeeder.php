<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n = [
            ['size' => 'L'],
            ['size' => 'XL'],
            ['size' => 'XXL'],
        ];

        DB::table('product_sizes')->insert($n);
    }
}
