<?php

namespace App\Http\Controllers;

use App\Food;
use App\Meal;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function create()
    {
        $meal = Meal::get();
        return view('admin.foods.create',compact('meal'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        Food::create($request->all());
        return back();
    }
}
