<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $fillable = ['title'];

    public static function getMealName($value)
    {
        $meal = Meal::find($value);
        //dd($meal->title);
        echo ".$meal->title.";
    }

}
