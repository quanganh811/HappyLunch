<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 
        'name', 
        'price', 
        'merchant_id', 
        'image'
    ];

    public function merchantItems(){
        return $this->hasOne(Merchant::class, 'merchant_id', 'id');
    }
}
