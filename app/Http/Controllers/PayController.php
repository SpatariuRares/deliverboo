<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayController extends Controller
{
    public function payment(){
        return view('guest.payment');
    }
}
