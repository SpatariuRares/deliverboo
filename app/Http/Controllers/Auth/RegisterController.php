<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Support\Str;
use App\Category;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'PIVA' => ['required', 'string', 'max:11','min:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // User fara' riferimento alle fillable nel model
        $slug = Str::slug($data['username'], '-');
        $slug_presente = User::where('slug', $slug)->first();
        // dd($slug_presente);
        $contatore = 1;
        if ($slug_presente){
            while($slug_presente){
                $slug_attuale = $slug . '-' . $contatore;
                $slug_presente = User::where('slug', $slug_attuale)->first();
                $contatore++;
            }
        } else {
            $slug_attuale = $slug;
        }
        

        $new_user = User::create(
            [
            'username' => $data['username'],
            'address' => $data['address'],
            'slug'=> $slug_attuale,
            'PIVA' => $data['PIVA'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            // 'thumb' => 'https://mod.go.ke/wp-content/uploads/2021/04/default-profile-pic.png'
        ]);

        if(isset($data['categories'])) {
            $new_user->categories()->attach($data['categories']);
        }


        return $new_user;
    }
}
