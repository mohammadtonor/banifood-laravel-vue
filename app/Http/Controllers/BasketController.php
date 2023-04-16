<?php

namespace App\Http\Controllers;

use App\Http\Middleware\TrimStrings;
use App\Lib\Helper;
use App\Meal;
use App\Menu;
use App\support\Peyment\Transaction;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Support\Basket\Basket;
use App\Location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BasketController extends Controller
{
    private $basket;

    private $transaction;

    public function __construct(Basket $basket , Transaction $transaction)
    {

        $this->middleware('auth')->only(['checkoutForm', 'checkout', 'orderRegist','index']);
        $this->basket = $basket;
        $this->transaction = $transaction;
    }

    public function index()
    {
        $dey = Carbon::now()->dayOfWeek + 1;
        $numberOfDay = 7 - $dey > 0? 7 - $dey : 14 - $dey;
        $count = Menu::select('date')->distinct()->get()->count();
        $date = Menu::select('date')->orderby('date')->distinct()->skip($count-$numberOfDay)->take(7)->get();
        $menu  = Menu::orderby('meal_id')->get();
        $meals = Meal::all();
        $item = $this->basket->all();
        return view('basket', compact('menu', 'date','item','meals'));
    }



    public function add(Request $request)
    {
        $menu = Menu::find($request->menu_id);
        return $this->basket->add($menu , 1);
        //return back()->with('success',true);
    }

    public function delete(Request $request)
    {
       $menu = Menu::find($request->menuRemove_id);
       return $this->basket->remove($menu);
       //return back();
    }

    public function checkoutForm()
    {
        $user =Auth::user();
        $locations = Location::get();
        return view('checkout',compact('user','locations'));
    }

    public function checkout(Request $request)
    {
        $location = $request->location_id;
        $wallet = Auth::user()->wallet;
        return view('orderSubmit',compact('location','wallet'));
    }

    public function orderRegist(Request $request)
    {
        //$this->validateForm($request);
        $loc =Location::find($request->location_id);
        $this->transaction->checkouts($loc);

        return redirect()->route('basket')->with('success', 'ُسفارش شما با موفقیت ثبت شد!!');

    }

    public function getBasket()
    {
        $item = $this->basketitems();
        return $item;
    }



    private function validateForm($request)
    {
        $request->validate([
            'method' => ['required']
        ]);
    }

    public function basketitems()
    {
        $itemsBasket = [];
        for ( $i = 0;$i < $this->basket->itemCount(); $i++)
        {
            $menus= DB::table('menus as m')->select('m.id','m.date','f.meal_id','f.title','f.price')
                ->where('m.id' ,'=',$this->basket->keys()[$i])
                ->Join('foods as f','m.food_id','=','f.id')
                ->get();

            foreach ($menus as $menu)
            {
                $itemsBasket[$i] = $menu;
                $itemsBasket[$i]->dates = Helper::date($menu->date);
                $itemsBasket[$i]->week = Helper::week($menu->date);
            }
        }
        return $itemsBasket;
    }
}
