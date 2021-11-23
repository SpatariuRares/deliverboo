<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = [
        'name','price','thumb','ingredients','visible','quantity'
    ];

    public function orders(){
        return $this->belongsToMany('App\Order');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
