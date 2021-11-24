<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++){
            $new_user = new User();
            $new_user->username =$faker->name();
            $new_user->address = $faker->streetAddress()  ;
            $new_user->email = $faker->email();
            $new_user->password = $faker->password();
            $new_user->PIVA = $faker->numerify('###########');
            $new_user->save();
        }
    }
}
