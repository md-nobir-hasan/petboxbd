<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n = [
            ['type' => 'Inside Dhaka','price' => '60'],
            ['type' => 'Outside Dhaka','price' => '120'],
        ];

        DB::table('shippings')->insert($n);
    }
}
