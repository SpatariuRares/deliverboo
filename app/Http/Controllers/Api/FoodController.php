<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Food;
class FoodController extends Controller
{
    public function CardFood($slug){
        $user = User::where('slug', $slug)->first();
        $food = Food::where('user_id', $user->id)->get();
        if(!$user){
            abort(404);
        }return response()->json($food);
    }
}
