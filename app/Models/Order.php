<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

   protected $fillable = [
        'user_id',
        'user_name',
        'game_id',
        'game_title',
        'price',
        'status',
        'is_paid',
        'paid_at',
        'completed_at'
    ];
}
