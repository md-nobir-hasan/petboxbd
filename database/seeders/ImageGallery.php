<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageGallery extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $n = [
            ['img'=>'seeder/5005.jpg','to' => 'product'],
            ['img'=>'seeder/5006.jpg','to' => 'product'],
            ['img'=>'seeder/5007.jpg','to' => 'product'],
        ];
        DB::table('image_galleries')->insert($n);
    }
}
