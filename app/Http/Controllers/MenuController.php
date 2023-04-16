<?php

namespace App\Http\Controllers;

use App\Food;
use App\Meal;
use App\Menu;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\PositiveInteger;

class MenuController extends Controller
{

    public function create()
    {
        $dey = Carbon::now()->dayOfWeek +1  ;
        $numberOfDay = 7 - $dey > 0? 7 - $dey : 14 - $dey;
        $count = Menu::select('date')->distinct()->get()->count();
        $date = Menu::select('date')->orderby('date')->distinct()->skip($count-$numberOfDay)->take(7)->get();
        $menu = Menu::orderby('meal_id','desc')->get();
        $food = Food::get();
        $meal = Meal::get();
        return view('admin.menus.create',compact('food','menu','date','meal'));
    }

    public function store(Request $request)
    {
        $foods = $request->foods;
        for ($i = 0; $i < count($foods); $i++)
        {
            $food = Food::find($foods[$i]);
             Menu::create([
                'food_id' => $foods[$i],
                'date' => $request->date,
                'dishes' => $request->dishes,
                'meal_id' => $food->meal_id
            ]);
        }
        return back();
    }

}
