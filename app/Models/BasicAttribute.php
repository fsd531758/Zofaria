<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicAttribute extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'item_id', 'value', 'type', 'order'];
    protected $table = 'basic_attributes';

    public function productQualitySize()
    {
        return $this->hasMany(ProductQualitySize::class);
    }
}
