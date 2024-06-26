<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'order_id', 'product_quality_size_id', 'price', 'quantity', 'discount'];
    protected $table = 'order_product';

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function productQualitySize()
    {
        return $this->belongsTo(ProductQualitySize::class);
    }
}
