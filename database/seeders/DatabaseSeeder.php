<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(MainKeySeeder::class);
        $this->call(ImageGallery::class);
        $this->call(FeatureSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(userSeeder::class);
        $this->call(SiteServiceSeeder::class);
        $this->call(SiteSettingSeeder::class);
        $this->call(categorySeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(SizeSeeder::class);
        $this->call(ShippingSeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(CompanyInfoSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(OrderStatusSeeder::class);
    }
}
