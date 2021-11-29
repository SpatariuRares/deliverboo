<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table='foods';//indica la tabella da usare al posto da quella di default
    
    protected $fillable = [
        'user_id','name','price','thumb','ingredients','visible','quantity'
    ];
    
    public function user(){
        //dd($this);
        return $this->belongsTo('App\User');
    }
    
    public function orders(){
        return $this->belongsToMany('App\Order');
    }

}
