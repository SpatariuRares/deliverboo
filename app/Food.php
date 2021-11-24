<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table='foods';//indica la tabella da usare al posto da quella di default
    
    protected $fillable = [
        'name','price','thumb','ingrediends','visible','quantity'
    ];

    public function orders(){
        return $this->belongsToMany('App\Order');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
