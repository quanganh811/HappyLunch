<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $table = 'merchants';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'category_id',
        'app_id',
        'link'
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function app()
    {
        return $this->hasOne(App::class, 'id', 'app_id');
    }

    public function order()
    {
        return $this->hasMany(Order::class, 'merchant_id', 'id');
    }
}
