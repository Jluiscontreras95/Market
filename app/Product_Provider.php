<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Product_Provider extends Pivot
{
    protected $fillable = [

        'provider_id',
        'product_id',
        
       ];
    
    //    public function product(){
    //     return $this->belongsTo(User::class);
    //    }
    
    //    public function provider(){
    //     return $this->belongsTo(Provider::class);
    //    }
}
