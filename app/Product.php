<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = [
        'code',
        'name', 
        'stock',
        'image', 
        'sell_price',
        'status',
        'taxproduct',
        'category_id',
 
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function providers()
    {    
        return $this->belongsToMany(Provider::class)->withTimestamps();
    }

}
