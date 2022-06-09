<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    public function run()
    {
        Ingredient::create(['name' => 'tomato'])->recipes()->attach([1 => ['quantity' => rand(1, 3)], 2 => ['quantity' => rand(1, 3)]]);
        Ingredient::create(['name' => 'lemon'])->recipes()->attach([2 => ['quantity' => rand(1, 3)], 3 => ['quantity' => rand(1, 3)]]);
        Ingredient::create(['name' => 'potato'])->recipes()->attach([3 => ['quantity' => rand(1, 3)], 4 => ['quantity' => rand(1, 3)]]);
        Ingredient::create(['name' => 'rice'])->recipes()->attach([4 => ['quantity' => rand(1, 3)], 5 => ['quantity' => rand(1, 3)]]);
        Ingredient::create(['name' => 'ketchup'])->recipes()->attach([5 => ['quantity' => rand(1, 3)], 6 => ['quantity' => rand(1, 3)]]);
        Ingredient::create(['name' => 'lettuce'])->recipes()->attach([6 => ['quantity' => rand(1, 3)], 1 => ['quantity' => rand(1, 3)]]);
        Ingredient::create(['name' => 'onion'])->recipes()->attach([1 => ['quantity' => rand(1, 3)], 2 => ['quantity' => rand(1, 3)]]);
        Ingredient::create(['name' => 'cheese'])->recipes()->attach([2 => ['quantity' => rand(1, 3)], 3 => ['quantity' => rand(1, 3)]]);
        Ingredient::create(['name' => 'meat'])->recipes()->attach([3 => ['quantity' => rand(1, 3)], 4 => ['quantity' => rand(1, 3)]]);
        Ingredient::create(['name' => 'chicken'])->recipes()->attach([4 => ['quantity' => rand(1, 3)], 5 => ['quantity' => rand(1, 3)]]);
    }
}
