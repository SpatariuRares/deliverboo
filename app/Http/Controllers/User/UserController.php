<?php

namespace App\Http\Controllers\User;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;  // DA AGGIUNGERE PER PUNTARE CON L'UTENTE ATTUALMENTE AUTENTICATO
use Illuminate\Support\Facades\Storage;

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
        // dd($user->categories);
        return view("user.restaurant.index", compact("user"));
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
    public function edit($slug)
    {
        $categories = Category::all();
        $user = User::where('slug', $slug)->first();
        if(!$user){
            abort(404);
        }
        return view("user.restaurant.edit", compact("user", "categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    { 

        $user = Auth::user(); 
        //VALIDO I DATI
        $request->validate([
            "username" => "required | max:30",
            "address" => "required | max: 100",
            "categories" => "required | exists:categories,id",
            "image" => "nullable | image | max:2048",
        ]);
        
        $form_data = $request->all();

        if(!isset($form_data['visible'])){
            $form_data['visible']=false;
        }
        if(isset($form_data['deleteImage'])){
            Storage::delete($user->thumb);
            $form_data['thumb']=null;
        }

        if(array_key_exists('image', $form_data)){
            Storage::delete($user->thumb);
            //cancello l'immagine
            //salviamo l'immagine e recuperiamo il path
            $thumb_path = Storage::put('user_thumb', $form_data['image']);
        
            // aggiungiamo all'array che viene usato nella funzione fill la chiave cover
            // che contiene il percorso relativo dell'immagine caricata a partire  da public/storage
            $form_data['thumb'] = $thumb_path;
        }
        
        
        
        if(array_key_exists("categories", $form_data)) {
            // dd($user, $form_data["categories"]);
            $user->categories()->sync($form_data["categories"]);
        }
        else {
            $user->categories()->sync([]);
        }
        
        $user->update($form_data);
        // dd($form_data);
        
        return redirect()->route("user.restaurant.index")->with("updated", "Dati Utente correttamente aggiornati");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        $user = User::find(Auth::user()->id);

        Auth::logout();

        
        $user->username=null;
        $user->email=null;
        $user->address=null;
        $user->PIVA=null;
        $user->thumb=null;
        $user->slug=null;

        $user->update();
        // dd($user);
        return redirect()->route('index')->with('deleted', 'Account eliminato');
    }
}
