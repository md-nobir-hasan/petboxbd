<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n = [
            ['name' => 'Product','status' => 1],
            ['name' => 'Order','status' => 1],
            ['name' => 'User','status' => 1],
            ['name' => 'Special','status' => 1],
            ['name' => 'Frontend','status' => 1],
        ];

        DB::table('main_keys')->insert($n);
    }
}
