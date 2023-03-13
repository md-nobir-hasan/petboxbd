<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n = [
            ['payment' => 'Cash On Delivery'],
            ['payment' => 'Bkash'],
        ];

        DB::table('payments')->insert($n);
    }
}
