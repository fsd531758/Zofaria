<?php

namespace Database\Seeders;

use App\Models\ProductSize;
use Illuminate\Database\Seeder;

class ProductSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = [
            'small',
            'medium',
            'large',

        ];

        for ($i = 0; $i < count($sizes); $i++) {
            $product_size = ProductSize::create([
                'product_id' => 1,
                'size' => $sizes[$i],
            ]);
        }
    }
}
