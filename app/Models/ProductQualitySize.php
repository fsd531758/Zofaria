<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductQualitySize extends Model
{
    use HasFactory;
    protected $fillable = ['product_size_id', 'product_quality_id', 'quantity', 'price_two', 'discount', 'status'];
    protected $table = 'product_quality_size';

    public function basicAttribute()
    {
        return $this->belongsTo(BasicAttribute::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}