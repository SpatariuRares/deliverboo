<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use App\Food;
use App\User;
class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $Foods = [
            [ 
                'name' => 'lasagna',
                'ingredients'=>'pasta sadasdgasdfdgdgsfsafvfsddvxc'
            ],
            [ 
                'name' => 'sushi',
                'ingredients'=>'pesce sadasdgasdfdgdgsfsafvfsddvxc'
            ],
            [ 
                'name' => 'gelato',
                'ingredients'=>'latte sadasdgasdfdgdgsfsafvfsddvxc'
            ],
            [ 
                'name' => 'hamburger',
                'ingredients'=>'carne sadasdgasdfdgdgsfsafvfsddvxc'
            ],
            [ 
                'name' => 'hamburger',
                'ingredients'=>'kebab sadasdgasdfdgdgsfsafvfsddvxc'
            ],
        ];

        $idMax=DB::table('users')->orderBy('id', 'desc')->first();;;
        $idMin=User::all()->first();
        for($i = 0; $i < count($Foods); $i++){
            $new_food = new Food();
            do{
                $randomID=$faker->numberBetween($idMin->id, $idMax->id);
            }while(User::where('id', '=', $randomID)->first() == null);
            $new_food->user_id = $randomID;
            $new_food->name =$Foods[$i]['name'];
            $new_food->price = $faker->randomFloat(2, 10, 25);
            $new_food->thumb = $faker->imageUrl(360, 360, 'animals', true, 'dogs', true);
            $new_food->ingredients = $Foods[$i]['ingredients'];
            $new_food->visible = $faker->boolean();
            $new_food->quantity = $faker->numberBetween(0, 200);
            $new_food->save();
        }
    }
}
