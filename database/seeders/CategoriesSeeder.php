<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title_ar = [
            'زيت زيتون مكرر',
            'زيت زيتون بكر',

        ];

        $title_en = [
            'Refined ovile oil',
            'Virgin ovile oil',
        ];

        $image = [
            'refined_oils.jpg',
            'Virgin.jpg',
        ];

        for ($i = 0; $i < count($title_ar); $i++) {
            $category = Category::create([
                'ar' => [
                    'title' => $title_ar[$i],

                ],
                'en' => [
                    'title' => $title_en[$i],

                ],
            ]);
            $category->file()->create([
                'path' => 'seeders/categories/' . $image[$i],
                'type' => 'image',
            ]);
        }
    }
}
