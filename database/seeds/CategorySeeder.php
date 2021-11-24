<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['italiana', 'sushi', 'gelato', 'hamburger', 'kebab', 'giapponese'];
        for($i = 0; $i < count($categories); $i++){
            $new_category = new Category();
            $new_category->name = $categories[$i];
            $new_category->slug = Str::slug($categories[$i]);
            $new_category->save();
        }
    }
}
