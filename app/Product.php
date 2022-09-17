<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = [
        'code',
        'name', 
        'stock',
        'measure',
        'image',
        'cost_price',
        'utility', 
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

    public function saleDetails(){
        return $this->belongsToMany(SaleDetail::class);
       }

}
