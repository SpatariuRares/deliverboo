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
        //dd($Categories) ;
        return view('guest.categories.index', compact('Categories'));
    }

    public function show(Category $category)
    {
        if(!$category) {
            abort(404);
        }
        return view("guest.categories.show", compact("category"));
    }
}
