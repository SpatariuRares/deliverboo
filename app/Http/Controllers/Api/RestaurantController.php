<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        // $users = DB::table('users')
        //     ->leftJoin('category_user', 'users.id', '=', 'category_user.user_id')
        //     ->get();
        $categories = Category::all();
        // $users = $category->user;

        dd($users);
        $data = [
            "success" => true,
            "users" => $users,
            "categories" => $categories,
        ];
        return response()->json($data);
    }

    public function show($id)
    {
        // return response()->json($request->id);

        $category = Category::where("id", $id)->first();
        $users = $category->user;
        $data = [
            "success" => true,
            "users" => $users,
        ];
        return response()->json($data);
    }
}
