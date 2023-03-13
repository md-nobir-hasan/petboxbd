<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n = [
            ['name' => 'New','status' => 1],
            ['name' => 'Processing','status' => 1],
            ['name' => 'Shipped','status' => 1],
            ['name' => 'Delivered','status' => 1],
            ['name' => 'Cancel','status' => 1],
        ];

        DB::table('order_statuses')->insert($n);
    }
}
