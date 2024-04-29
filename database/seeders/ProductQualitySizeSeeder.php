<?php

namespace Database\Seeders;

use App\Models\ProductQualitySize;
use Illuminate\Database\Seeder;

class ProductQualitySizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [3, 1, 10, 1200, 10, 1],
            [3, 2, 10, 1200, 10, 1],
            [3, 3, 5, 1200, 10, 1],
            [1, 1, 7, 600, 10, 1],

        ];

        foreach ($data as $item) {
            $product_quality_size = ProductQualitySize::create([
                'product_size_id' => $item[0],
                'product_quality_id' => $item[1],
                'quantity' => $item[2],
                'price_two' => $item[3],
                'discount' => $item[4],
                'status' => $item[5],
            ]);
        }
    }
}
