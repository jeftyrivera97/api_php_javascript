<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RecipeOrder;
use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Jobs\Kitchen;
use App\Http\Resources\RecipeOrderResource;

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

    public function create(Request $request)
    {
        $recipe = Recipe::inRandomOrder()->first();

        $record = RecipeOrder::create(['recipe_id' => $recipe->id]);
        Kitchen::dispatch($record);

        $id_order= $record->id;
        $order= RecipeOrder::with('recipe')->where('id',$id_order)->first();

        return $order;
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
