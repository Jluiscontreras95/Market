<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = [
        'code',
        'code_product',
        'name', 
        'stock',
        'measure',
        'measure_alter',
        'measure_alter_cant',
        'image',
        'cost_price',
        'utility', 
        'sell_price',
        'cost_price_may',
        'utility_may', 
        'sell_price_may',
        'status',
        'taxproduct',
        'tax',
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

    public function saleDetails(){
        return $this->belongsToMany(SaleDetail::class);
       }

}
