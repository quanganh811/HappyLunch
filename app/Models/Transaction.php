<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id', 
        'item_id', 
        'item_name', 
        'item_price', 
        'quantity', 
        'status'
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','owner_id');
    }
    public function order()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }
    public function item()
    {
        return $this->hasOne(Item::class, 'id', 'item_id');
    }
}
