<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'date' , 'food_id' , 'dishes','meal_id'
    ];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function confirmMeal(int $meal)
    {
        $this->meal_id = $meal;
    }
}
