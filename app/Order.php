<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'total','email','address','fullName','paymentStatus'
    ];

    public function food(){
        return $this->belongsToMany('App\Food','food_order','quantity');
    }
}
