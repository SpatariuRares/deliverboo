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
            $new_order = new Order();
            $new_order->total =$faker->numberBetween(0, 100);
            $new_order->email = $faker->email();
            // dobbiamo aggiungere thumb
            //$new_order->address = $faker->image(null, 360, 360, 'order', true, true, 'hamburger', false);
            $new_order->address = $faker->streetAddress();
            $new_order->fullName = $faker->name();
            $new_order->paymentStatus = $faker->boolean();
            $new_order->save();
        }
    }
}
