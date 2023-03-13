<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n = [
            ['name' => 'RENZZI', 'title' => 'RENZZI', 'logo' => 'seeder/logo.webp', 'address' => 'Dhaka'],
        ];
        $n2 = [
            ['phone' => '01308826372', 'whatsapp' => '01308826372', 'facebook_group_link' => 'https://www.facebook.com/renzzi.com.tng/?mibextid=ZbWKwL', 'email' => 'renzzicom@gmail.com'],
        ];

        DB::table('company_infos')->insert($n);
        DB::table('company_contacts')->insert($n2);
    }
}
