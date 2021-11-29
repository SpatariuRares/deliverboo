<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();        // PER PUNTARE L'UTENTE ATTUALMENTE AUTENTICATO
        return view("guest.restaurant.index", compact("users"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // $user = Food::where('id', $id)->first();
        dd($user);
        if(!$user){
            abort(404);
        }return view('guest.restaurant.show', compact('user'));
    }
}
