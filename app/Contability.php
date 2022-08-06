<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contability extends Model
{
    protected $fillable = [
        
        'purchase_id',
        'sale_id',
        'description',
        'contability_date',
        'must',
        'have',
       ];

       public function purchase(){
        return $this->belongsTo(Purchase::class);
       }
       public function sale(){
        return $this->belongsTo(Sale::class);
       }
}
