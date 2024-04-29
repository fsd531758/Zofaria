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
        // \App\Models\User::factory(10)->create();
        $this->call(LaratrustSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(SettingContactSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductQualitySeeder::class);
        $this->call(ProductSizeSeeder::class);
        $this->call(ProductQualitySizeSeeder::class);
//        NewsLetter::factory(6000)->create();
    }
}
