<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductQualitySize extends Model
{
    use HasFactory;
    protected $fillable = ['product_size_id', 'product_quality_id', 'quantity', 'price_two', 'discount', 'status'];
    protected $table = 'product_quality_size';

    public function productQuality()
    {
        return $this->belongsTo(ProductQuality::class);
    }

    public function productSize()
    {
        return $this->belongsTo(ProductSize::class);
    }
}
