<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Categories = Category::all();
        return view('guest.Categories.index', compact('Categories'));
    }

    public function show(Category $category)
    {
        if(!$category) {
            abort(404);
        }
        $user = User::find($category);
        return view("user.categories.show", compact("category"));
    }
}
