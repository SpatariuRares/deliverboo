<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Food;


class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
        $user = User::where('slug', $slug)->first();
        $food = Food::where('user_id', $user->id)->get();
        // $food = Food::all();
        $data = [
            "success" => true,
            "foods" => $food,
        ];
        return response()->json($data);
    }
}
