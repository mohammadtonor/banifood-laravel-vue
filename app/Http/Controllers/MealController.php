<?php

namespace App\Http\Controllers;

use App\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function create()
    {
        return view('admin.meal.create');
    }

    public function store(Request $request)
    {
        Meal::create($request->all());
        return back();
    }
}
