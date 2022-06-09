<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\IngredientOrder;
use Illuminate\Http\Request;
use App\Http\Resources\IngredientOrderResource;

class IngredientOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return IngredientOrderResource::collection(IngredientOrder::with('ingredient')->get());

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
     * @param  \App\Models\IngredientOrder  $ingredientOrder
     * @return \Illuminate\Http\Response
     */
    public function show(IngredientOrder $ingredientOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IngredientOrder  $ingredientOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IngredientOrder $ingredientOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IngredientOrder  $ingredientOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(IngredientOrder $ingredientOrder)
    {
        //
    }
}
