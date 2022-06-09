<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ingredient_id')->unsigned();
            $table->unsignedBigInteger('quantity');
            $table->timestamps();
            
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient_orders');
    }
}
