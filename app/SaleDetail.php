<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    protected $fillable = [
        'sale_id',
        'product_id',
        'quantity',
        'measure',
        'price',
        'cash',
        'debit',
        'biopayment',
        'dollar',
        'movilpayment',
        'transfer',
        'tax',
        'discount',
    ];

        public function sale(){
            return $this->belongsTo(Sale::class);
        }
    
       public function product(){
            return $this->belongsTo(Product::class);
       }
}
