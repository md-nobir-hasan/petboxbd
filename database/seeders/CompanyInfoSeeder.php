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
            ['name' => 'PETBOX', 'title' => 'PETBOX', 'logo' => 'seeder/logo.webp', 'address' => 'Dhaka'],
        ];
        $n2 = [
            ['phone' => '01675571016', 'whatsapp' => '01675571016', 'facebook_group_link' => '', 'email' => 'info@petboxbd.com'],
        ];

        DB::table('company_infos')->insert($n);
        DB::table('company_contacts')->insert($n2);
    }
}
