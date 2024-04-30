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
            [4, 6, 1, 10, 1200, 10, 1],
            [4, 6, 1, 10, 1200, 10, 1],
            [4, 6, 2, 5, 1200, 10, 1],
            [4, 6, 2, 7, 600, 10, 1],

        ];

        foreach ($data as $item) {
            $product_quality_size = ProductQualitySize::create([
                'size_id' => $item[0],
                'quality_id' => $item[1],
                'product_id' => $item[2],
                'quantity' => $item[3],
                'price_two' => $item[4],
                'discount' => $item[5],
                'status' => $item[6],
            ]);
        }
    }
}
