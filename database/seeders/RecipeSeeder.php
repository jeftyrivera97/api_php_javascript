<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert([
            'name' => 'Lasagne',
        ]);
        DB::table('recipes')->insert([
            'name' => 'Chicken Fajitas',
        ]);
        DB::table('recipes')->insert([
            'name' => 'MeatBalls',
        ]);
        DB::table('recipes')->insert([
            'name' => 'Tomato Pizzas',
        ]);
        DB::table('recipes')->insert([
            'name' => 'Fried Chicken',
        ]);
        DB::table('recipes')->insert([
            'name' => 'Fried Meat',
        ]);
    }
}
