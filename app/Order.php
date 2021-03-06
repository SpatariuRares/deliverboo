<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'total','email','address','fullName','paymentStatus'
    ];

    public function foods(){
        return $this->belongsToMany('App\Food')->withPivot('quantity');
    }
}
