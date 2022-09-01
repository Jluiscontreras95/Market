<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [

        'client_id',
        'user_id',
        'sale_date',
        'total_tax',
        'total',
        'status',
        'picture',
       ];

       public function user(){
        return $this->belongsTo(User::class);
       }
    
       public function client(){
        return $this->belongsTo(Client::class);
       }
    
       public function saleDetails(){
        return $this->hasMany(SaleDetail::class);
       }

       public function contability(){
        return $this->hasMany(Contability::class);
       }
}
