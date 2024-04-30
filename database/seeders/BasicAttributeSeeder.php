<?php

namespace Database\Seeders;

use App\Models\BasicAttribute;
use Illuminate\Database\Seeder;

class BasicAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $Items = [
            ["item" => "1.", "value" => "size", "type" => "1.", "order" => 0],
            ["item" => "1.1.", "value" => "Small", "type" => "1.", "order" => 1],
            ["item" => "1.2.", "value" => "Large", "type" => "1.", "order" => 2],
            ["item" => "1.3.", "value" => "Very-Large", "type" => "1.", "order" => 3],

            ["item" => "2.", "value" => "quality", "type" => "2.", "order" => 0],
            ["item" => "2.1.", "value" => "Good", "type" => "2.", "order" => 1],
            ["item" => "2.2.", "value" => "Very-Good", "type" => "2.", "order" => 2],
            ["item" => "2.3.", "value" => "Excellent", "type" => "2.", "order" => 3],

        ];

        foreach ($Items as $item) {
            $basic_attribute = BasicAttribute::create([
                'item_id' => $item['item'],
                'value' => $item['value'],
                'type' => $item['type'],
                'order' => $item['order'],
            ]);
        }
    }
}
