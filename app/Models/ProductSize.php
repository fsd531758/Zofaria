<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'product_id', 'size'];
    protected $table = 'sizes';

    public function productQualitySize()
    {
        return $this->hasMany(ProductQualitySize::class);
    }
}
