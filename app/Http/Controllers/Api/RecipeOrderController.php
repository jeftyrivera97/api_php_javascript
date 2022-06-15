<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RecipeOrder;
use App\Models\Ingredient;
use App\Models\IngredientRecipe;
use App\Models\IngredientOrder;
use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Jobs\Kitchen;
use App\Http\Resources\RecipeOrderResource;
use Illuminate\Support\Facades\Http;
class RecipeOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RecipeOrderResource::collection(RecipeOrder::with('recipe')->get());
    }

    public function ingredient()
    {
        $recipe = Recipe::inRandomOrder()->first();
        return $recipe;
    }

    public function create(Request $request)
    {

        $recipe = Recipe::inRandomOrder()->first();
        $recipe_order= new RecipeOrder;
        $recipe_order->recipe_id = $recipe->id;
        $recipe_order->state = "Preparando";
        $recipe_order->save();

        $id_recipe_order= $recipe_order->id;

        $id_recipe= $recipe->id;
        $ingredients= IngredientRecipe::where('recipe_id',$id_recipe)->get();
        $counter= count($ingredients);

        for($x=0; $x<$counter; $x++){
            $id_ingredient= $ingredients[$x]->ingredient_id;
            $ingredient= Ingredient::where('id',$id_ingredient)->first();
            $stock= $ingredient->quantity;

            if($stock==0){
                $sold=false;
                $quantitySold=0;
                do{
                    $buy_product = Http::get("https://recruitment.alegra.com/api/farmers-market/buy?ingredient=tomato");
                    $quantitySold= $buy_product['quantitySold'];

                }while($quantitySold==0);

                $ingredient_orders = new IngredientOrder;
                $ingredient_orders->ingredient_id = $ingredients[$x]->ingredient_id;
                $ingredient_orders->quantity = $quantitySold;
                $ingredient_orders->save();

                $i = Ingredient::find($id_ingredient);
                $i->quantity = $quantitySold;
                $i->save();
            }
            $i = Ingredient::find($id_ingredient);
            $i->quantity =  $i->quantity-1;
            $i->save();
        }

        $o = RecipeOrder::find($id_recipe_order);
        $o-> state = 'Listo';
        $o-> save();

        $records= RecipeOrder::with('recipe')->where('id',$id_recipe)->first();
        return $records;

    }

    public function records($id)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RecipeOrder  $recipeOrder
     * @return \Illuminate\Http\Response
     */
    public function show(RecipeOrder $recipeOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RecipeOrder  $recipeOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecipeOrder $recipeOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RecipeOrder  $recipeOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecipeOrder $recipeOrder)
    {
        //
    }
}
