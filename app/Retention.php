<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retention extends Model
{
    //
    protected $fillable = [

        'purchase_id',
        'n_control',
        'n_debit',
        'total',
        'exempt_amount',
        'taxable_base',
        'share',
        'iva',
        'retention',
        'detained',
        'total_pagar',
        'total_neto',

    ];

    public function purchase(){
        return $this->belongsTo(User::class);
       }
}
