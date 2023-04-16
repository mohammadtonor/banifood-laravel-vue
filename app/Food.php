<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';

    protected $fillable = [
        'title', 'meal', 'image', 'meal_id', 'price'
    ];

    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }
}
