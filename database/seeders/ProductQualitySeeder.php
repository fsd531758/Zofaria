<?php

namespace Database\Seeders;

use App\Models\ProductQuality;
use Illuminate\Database\Seeder;

class ProductQualitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $quality = [
            'good',
            'very-good',
            'excellent',
        ];

        for ($i = 0; $i < count($quality); $i++) {
            $product_quality = ProductQuality::create([
                'product_id' => 1,
                'quality' => $quality[$i],
            ]);
        }
    }
}
