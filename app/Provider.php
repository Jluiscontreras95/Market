<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{

    protected $fillable = [
        'name', 'email', 'rif_number', 'address','phone', 'account_bank',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

}
