<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use App\Food;
use App\User;
use Illuminate\Support\Facades\DB;
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
                'ingrediends'=>'pasta sadasdgasdfdgdgsfsafvfsddvxc'
            ],
            [ 
                'name' => 'sushi',
                'ingrediends'=>'pesce sadasdgasdfdgdgsfsafvfsddvxc'
            ],
            [ 
                'name' => 'gelato',
                'ingrediends'=>'latte sadasdgasdfdgdgsfsafvfsddvxc'
            ],
            [ 
                'name' => 'hamburger',
                'ingrediends'=>'carne sadasdgasdfdgdgsfsafvfsddvxc'
            ],
            [ 
                'name' => 'hamburger',
                'ingrediends'=>'kebab sadasdgasdfdgdgsfsafvfsddvxc'
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
            $new_food->ingrediends = $Foods[$i]['ingrediends'];
            $new_food->visible = $faker->boolean();
            $new_food->quantity = $faker->numberBetween(0, 200);
            $new_food->save();
        }
    }
}
