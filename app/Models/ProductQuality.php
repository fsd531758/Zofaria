<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductQuality extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'product_id', 'quality'];
    protected $table = 'qualities';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productQualitySize()
    {
        return $this->hasMany(ProductQualitySize::class);
    }
}
