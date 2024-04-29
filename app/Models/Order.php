<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'total',
    ];

    public $timestamps = true;

    // relations start
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    // relations end

}
