<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 
        'name'
    ];

    public function merchants()
    {
        return $this->hasMany(Merchant::class, 'category_id', 'id');
    }
}
