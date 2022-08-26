<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = [
        'name',
        'description',
        'logo',
        'email',
        'phone_1',
        'phone_2',
        'address',
        'ruc',
        'taxpayer',
    ];

   
}
