<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipeOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('recipe_id')->unsigned();
            $table->enum('state', ['Preparando', 'Listo'])->default('Preparando');
            
            $table->foreign('recipe_id')->references('id')->on('recipes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipe_orders');
    }
}
