<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;  // DA AGGIUNGERE PER PUNTARE CON L'UTENTE ATTUALMENTE AUTENTICATO

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();        // PER PUNTARE L'UTENTE ATTUALMENTE AUTENTICATO
        // dd($users);
        return view("user.user.index", compact("user"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $categories = Category::all();

        // dd($user);
        if(!$user) {
            abort(404);
        }

        return view("user.user.edit", compact("user", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //VALIDO I DATI
        $request->validate([
            "username" => "required | max:30",
            "address" => "required | max: 100",
            "category" => "required | exists:category,id",
        ]);
        
        $form_data = $request->all();

        

        //VERIFICO SE L'USERNAME RICEVUTO DAL FORM E' DIVERSO DAL VECCHIO
        // if($form_data["username"] != $user->username) {

        // }

        $user->update($form_data);
        
        $user->categories()->sync($form_data["category"]);

        return redirect()->route("user.user.index")->with("updated", "Dati Utente correttamente aggiornati");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
