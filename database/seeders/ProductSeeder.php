<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title_ar = [
            ' زيت زيتون بكر درجة اولى',
            'زيت زيتون بكر',
            'زيت زيتون مكرر',
            "زيت زيتون مصافى",

        ];

        $title_en = [
            'Extra Virgin ovile oil',
            'Virgin ovile oil',
            'Refined ovile oil',
            'Pure ovile oil',
        ];
        $description_ar = [
            ' زيت زيتون بكر درجة اولى',
            'زيت زيتون بكر',
            'زيت زيتون مكرر',
            "زيت زيتون مصافى",
        ];

        $description_en = [
            '<p> Extra Virgin ovile oil</p>',
            'Virgin ovile oil',
            'Refined ovile oil',
            'Pure ovile oil',
        ];

        $image = [
            'extra.jpg',
            'pure.jpg',
            'virgin.jpg',
            'refined.jpg',
        ];

        for ($i = 0; $i < count($title_ar); $i++) {
            $product = Product::create([
                'ar' => [
                    'title' => $title_ar[$i],
                    'description' => $description_ar[$i],

                ],
                'en' => [
                    'title' => $title_en[$i],
                    'description' => $description_en[$i],

                ],
                'status' => 1,
                'price' => 1000,
                'category_id' => $i / count($title_ar) + 1,

            ]);
            $product->file()->create([
                'path' => 'seeders/products/' . $image[$i],
                'type' => 'image',
            ]);
        }
    }
}
