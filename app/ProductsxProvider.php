<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsxProvider extends Model
{
    protected $fillable = [

        'provider_id',
        'product_id',
        
       ];

       protected $table = 'productsxprovider';
    
       public function product(){
        return $this->belongsTo(User::class);
       }
    
       public function provider(){
        return $this->belongsTo(Provider::class);
       }
}
