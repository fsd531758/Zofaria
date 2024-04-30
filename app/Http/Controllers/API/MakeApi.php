<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BasicAttribute;

class MakeApi extends Controller
{
    private $holder;

    public function get_items()
    {
        /* this api return all  basicAttributes parents
        $parent_regex = config('shared.parent');
        $items = BasicAttribute::where("item_id", "REGEXP", $parent)->get();
         */
        /*this api will return all the childs basicAttributes
        $child_regex = config('shared.child');
        $items = BasicAttribute::where("item_id", "REGEXP", $child_regex)->get();
        return $items;
         */

        $size_regex = config('shared.quality_regex');
        $sizes = BasicAttribute::where("item_id", "REGEXP", $size_regex)->get();
        return $sizes;


    }

}
