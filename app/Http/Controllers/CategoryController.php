<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $Categories = Category::all();
        return view('guest.categories.index', compact('Categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        if(!$category) {
            abort(404);
        }
        return view("guest.categories.show", compact("category"));
    }
}
