<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeOrder extends Model
{
    use HasFactory;
    protected $table="recipe_orders";
    protected $guarded = [];
    protected $fillable = ['recipe_id','state'];
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
