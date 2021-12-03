<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $users = User::all();
        $data = [
            "success" => true,
            "users" => $users,
            "categories" => $categories,
        ];
        return response()->json($data);
    }
    public function show($id)
    {
        $category = Category::where('id', $id)->first();
        $users=$category->user;
        $data = [
            "success" => true,
            "users" => $users,
        ];
        return response()->json($data);
    }
}
