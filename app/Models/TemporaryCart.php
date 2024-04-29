<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemporaryCart extends Model
{
    use HasFactory;
    protected $table = 'temporary_cart';
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    public $timestamps = true;

    // relations start
    public function users()
    {
        return $this->belongsTo(User::class);
    }

}
