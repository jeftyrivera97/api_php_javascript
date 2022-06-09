<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\IngredientOrder;
use App\Models\RecipeOrder;
use Illuminate\Support\Facades\Http;


class Kitchen implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $recipe_order;
    public function __construct(RecipeOrder $recipe_order)
    {
        //
        $this->recipe_order = $recipe_order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $ingredients = $this->recipe_order->recipe->ingredients;
        for ($i = 0; $i < count($ingredients); $i++) {
            if ($ingredients[$i]->pivot->quantity > $ingredients[$i]->quantity) {
                $product = $ingredients[$i]->name;
                do {
                    $buy_product = Http::get("https://recruitment.alegra.com/api/farmers-market/buy?ingredient=$product");
                    if ($buy_product['quantitySold'] != 0) {
                        $ingredients[$i]->quantity += $buy_product['quantitySold'];
                        $ingredients[$i]->save();
                        IngredientOrder::create(['ingredient_id' => $ingredients[$i]->id, 'quantity' => $buy_product['quantitySold']]);
                    }
                } while ($ingredients[$i]->pivot->quantity > $ingredients[$i]->quantity);
            }
            $ingredients[$i]->quantity -= $ingredients[$i]->pivot->quantity;
            $ingredients[$i]->save();
        }
        $this->recipe_order->update(['state' => "Listo"]);
    }
}
