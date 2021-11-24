<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Food;

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
        for($i = 0; $i < count($Foods); $i++){
            $new_food = new Food();
            $new_food->user_id = $faker->numberBetween(1, 11);
            $new_food->name =$Foods[$i]['name'];
            $new_food->price = $faker->randomFloat(2, 10, 25);
            $new_food->thumb = $faker->image(null, 360, 360, 'food', true, true, 'hamburger', false);
            $new_food->ingrediends = $Foods[$i]['ingrediends'];
            $new_food->visible = $faker->boolean();
            $new_food->quantity = $faker->numberBetween(0, 200);
            $new_food->save();
        }
    }
}
