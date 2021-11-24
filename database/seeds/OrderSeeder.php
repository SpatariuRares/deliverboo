<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++){
            $new_oeder = new Order();
            $new_oeder->total =$faker->numberBetween(0, 100);
            $new_oeder->email = $faker->email();
            $new_oeder->address = $faker->image(null, 360, 360, 'oeder', true, true, 'hamburger', false);
            $new_oeder->fullName = $faker->name();
            $new_oeder->paymentStatus = $faker->boolean();
            $new_oeder->save();
        }
    }
}
