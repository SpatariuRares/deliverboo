<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Food;
use App\User;
use Illuminate\Support\Facades\Auth;  // DA AGGIUNGERE PER PUNTARE CON L'UTENTE ATTUALMENTE AUTENTICATO
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = Auth::user();
        $foods = Food::where('user_id', '=', $currentUser->id)->get();
        return view('user.foods.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.foods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            //'user_id'=> 'required|exists:user_id',// Quello che mi hai passato, nella tabella cagtegories esiste l'id?
            'name'=>'required|max:255',
            'price'=> 'required',
            'image'=> 'nullable|image',
            'ingredients'=>'nullable',
            'visible'=>'nullable',
            'quatity'=>'nullable',
        ]);
        $formData=$request->all();
        $currentUser = Auth::user();                                     //PER PUNTARE L'UTENTE ATTUALMENTE AUTENTICATO
        $formData['user_id'] = $currentUser->id; 
        if(!isset($formData['visible'])){
            $formData['visible']=false;
        }
        $newFood = new Food();
        // storiamo i dati con il metodo fill
        
            // storiamo le immagini nel database
        if(array_key_exists('image', $formData)){
            //salviamo l'immagine e recuperiamo il path
            $thumb_path = Storage::put('food_thumb', $formData['image']);
        
            // aggiungiamo all'array che viene usato nella funzione fill la chiave cover
            // che contiene il percorso relativo dell'immagine caricata a partire  da public/storage
            $formData['thumb'] = $thumb_path;
        }

        $newFood->fill($formData);

        $newFood->save();
        //dd($formData);
        //$newFood->user()->attach($formData['user_id']);
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
        $currentUser = Auth::user();
        $food = Food::where('id', $id)->first();
        if(!$food || $food->user_id != $currentUser->id){
            abort(404);
        }
        return view('user.foods.show', compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        $currentUser = Auth::user();
        if(!$food || $food->user_id != $currentUser->id){
            abort(404);
        } 
        return view('user.foods.edit',compact('food'));
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
            //'user_id'=> 'required|exists:user_id',// Quello che mi hai passato, nella tabella cagtegories esiste l'id?
            'name'=>'required|max:255',
            'price'=> 'required',
            'image'=> 'nullable|image',
            'ingredients'=>'nullable',
            'visible'=>'nullable',
            'quatity'=>'nullable',
        ]);
        $formData=$request->all();
        $currentUser = Auth::user();                                     //PER PUNTARE L'UTENTE ATTUALMENTE AUTENTICATO
        $formData['user_id'] = $currentUser->id; 
        
        if(!isset($formData['visible'])){
            $formData['visible']=false;
        }
        if(isset($formData['deleteImage'])){
            Storage::delete($food->thumb);
            $formData['thumb']=null;
        }

        if(array_key_exists('image', $formData)){
            Storage::delete($food->thumb);
            //cancello l'immagine
            //salviamo l'immagine e recuperiamo il path
            $thumb_path = Storage::put('food_thumb', $formData['image']);
        
            // aggiungiamo all'array che viene usato nella funzione fill la chiave cover
            // che contiene il percorso relativo dell'immagine caricata a partire  da public/storage
            $formData['thumb'] = $thumb_path;
        }
        
        // storiamo i dati con il metodo fill
        $food->update($formData);
        
        
        return redirect()->route('user.foods.index')->with('updated', 'food correttamente aggiornato');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $currentUser = Auth::user();
        // dd("ciao");
        if(!$food || $food->user_id != $currentUser->id){
            abort(404);
        } 
        $deleteFood=[];
        $deleteFood["name"] = null;
        $deleteFood["thumb"] = null;
        $deleteFood["ingredients"] = null;
        $deleteFood["price"] = null;
        $deleteFood["visible"] = -1;
        $food->update($deleteFood);
        return redirect()->route('user.foods.index')->with('deleted', 'food eliminato');
    }
}
