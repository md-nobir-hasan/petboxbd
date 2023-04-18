<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n = [
            ['title' => 'Cat1','img'=>'seeder/c1.jpg','slug' => 'Cat1'],
            ['title' => 'Cat2','img'=>'seeder/c2.jpg','slug' => 'Cat2'],
            ['title' => 'Cat3','img'=>'seeder/c3.jpg','slug' => 'Cat3'],
        ];

        DB::table('categories')->insert($n);

        $na = [
            ['title' => 'Subcat1','cat_id' =>1,'status'=>'active'],
            ['title' => 'Subcat2','cat_id' =>1,'status'=>'active'],
            ['title' => 'Subcat3','cat_id' =>1,'status'=>'active'],
        ];

        DB::table('subcats')->insert($na);
    }
}
