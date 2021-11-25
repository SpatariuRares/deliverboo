<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Food;
use App\User;
class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::all();
        return view('user.foods.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('user.foods.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        dd($request->all());
        $request->validate([
            'user_id'=> 'required|exists:user_id',// Quello che mi hai passato, nella tabella cagtegories esiste l'id?
            'title'=>'required|max:255',
            'price'=> 'required',
            'thumb'=> 'nullable',
            'ingredients'=>'nullable',
            'visible'=>'required',
            'quatity'=>'nullable',
        ]);
        $formData=$request->all();

        $newFood = new Food();
        // storiamo i dati con il metodo fill
        $newFood->fill($formData);

        $newFood->save();
        
        $newFood->user_id()->attach(1);
        return redirect()->route('user.foods.index')->with('inserted', 'Il record è stato correttamente salvato');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food = Food::where('id', $id)->first();
        if(!$food){
            abort(404);
        }return view('user.foods.show', compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        if(!$food){
            abort(404);
        } 
        //!dobbiamo capire come passare user id al controller 

        return view('user.foods.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        $request->validate([
            'user_id'=> 'required|exists:user_id',// Quello che mi hai passato, nella tabella cagtegories esiste l'id?
            'title'=>'required|max:255',
            'price'=> 'required',
            'thumb'=> 'nullable',
            'ingredients'=>'nullable',
            'visible'=>'required',
            'quatity'=>'nullable',
        ]);
        $formData=$request->all();

        $newFood = new Food();
        // storiamo i dati con il metodo fill
        $newFood->update($formData);

        $newFood->save();
        
        $food->user_id()->sync($formData['user_id']);
        
        return redirect()->route('user.foods.index')->with('updated', 'Post correttamente aggiornato');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $food->user_id()->detach($food->user_id);
        $food->delete();
        return redirect()->route('user.foods.index')->with('deleted', 'Post eliminato');
    }
}
