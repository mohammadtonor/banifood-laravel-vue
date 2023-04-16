<?php

namespace App\Http\Controllers;

use App\Lib\Helper;
use App\Location;
use App\Menu;
use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$orders = Order::where('user_id', Auth::user()->id)->orderby('id','desc')->take(5)->get();
        $locations =Location::all();
        return view('orderShow',compact( 'locations'));
    }

    public function getItemResrved()
    {
        $order1 = Order::where('user_id',Auth::user()->id)->where('created_at','>=','2022-02-02 00:00:00')->orderby('id','DESC')->get();
        $itemsReserved = [];
        $j =0;
        for($i=0; $i< count($order1) ; $i ++)
        {
            foreach ($order1[$i]->menu as $items)
            {
                if ($order1[$i]->created_at->diffInDays(now()) <= 3)
                {
                    $items['order_id'] = $order1[$i]->id;
                    $items['title'] = $items->food->title;
                    $items['price'] = $items->food->price;
                    $items['dates'] = Helper::date($items->date);
                    $items['week'] = Helper::week($items->date);
                    $items['location'] = Helper::getParentLocName($items->pivot->location_id).' ( '.Helper::getLocationName($items->pivot->location_id).' ) ';
                    $itemsReserved[$j++] = $items;
                }

            }
        }
        return response()->json($itemsReserved);
    }

    public function edit(Request $request)
    {
        $order = $this->getOrderMenu($request)['order'];
        $menu = $this->getOrderMenu($request)['menu'];
        $locations = Location::all();
        return view('locationUpdate',compact('order', 'menu','locations'));
    }

    public function update(Request $request)
    {
        dd($request->user()->isadmin);

        $orderMenu = $this->getOrderMenu($request);
        $orderMenu['order']->menu()->syncWithoutDetaching([$orderMenu['menu']->id => ['location_id' => $request->location_id ]]);
        return true;
    }

    public function destroy(Request $request)
    {
        $wallet = Auth::user()->wallet;
        $orderMenu = $this->getOrderMenu($request);
        $menu = $orderMenu['menu'];
        $wallet += $orderMenu['menu']->food->price;
        $orderMenu['order']->menu()->detach($orderMenu['menu']);
        $user = User::where('id',Auth::user()->id)->update([ 'wallet' => $wallet]);
        return true;
    }

    public function getOrderMenu(Request $request)
    {
        $OrderMenu = [];
        $OrderMenu['order'] = Order::find($request->order_id);
        $OrderMenu['menu'] = $OrderMenu['order']->menu()->find($request->menu_id);
        return $OrderMenu;
    }

    public function getMenu()
    {
        return Menu::get();
    }

}
