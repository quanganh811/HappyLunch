<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 
        'master_id', 
        'merchant_id', 
        'link', 
        'shipping_fee', 
        'discount', 
        'total_fee', 
        'image_id', 
        'status'
    ];
    public function merchant()
    {
        return $this->hasOne(Merchant::class, 'id', 'merchant_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'order_id', 'id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'master_id');
    }
}
