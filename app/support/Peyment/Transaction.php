<?php

namespace App\support\Peyment;

use App\Location;
use App\Order;
use App\Peyment;
use App\Support\Basket\Basket;
use App\support\Peyment\Gateway\GatewayInterface;
use App\support\Peyment\Gateway\Pasargad;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\support\Peyment\Gateway\Saman;

class Transaction
{
    private $request;

    private $basket;



    public function __construct( Basket $basket , Request $request)
    {
        $this->request = $request;
        $this->basket = $basket;
    }

    public function checkouts(Location $location)
    {

        $order = $this->makeOrder($location);

        $payment = $this->makePayment($order);

        $remainWallet = $this->remainWallet();
        if ($this->request->methods == 'wallet' && $remainWallet >= 0 )
        {
            $this->walletUpdate($order ,$remainWallet);
            $payment->confirm('','',$order->amount);
        }
        elseif ($payment->isOnline() || $remainWallet < 0)
        {
            $remainAmount = -$remainWallet;

            return $this->gatewayFactory()->pay($order,$remainAmount);
        }

        $this->compeleteOrder($order);

        return $order;
    }

    public function verify()
    {
        $result = $this->gatewayFactory()->verify($this->request);

        if ($result['status'] === GatewayInterface::TRANSACTION_FAILED) return false;


        $this->confirmPayment($result);

        $this->compeleteOrder($result['order']);

        $this->walletUpdate($result['order'], 0);

        $this->request->merge(['user_id' => $result['order']->user_id]);

        return true;

    }

    private function confirmPayment($result)
    {
        return $result['order']->payment->confirm($result['refNum'],$result['gateway'], Auth::user()->wallet);
    }

    private function compeleteOrder($order)
    {
        $this->basket->clear();
    }

    private function gatewayFactory()
    {
        $gateway = [
            'saman' => Saman::class,
            'pasargad' => Pasargad::class
        ][$this->request->gateway];
        return resolve($gateway);
    }

    private function makeOrder(Location $location)
    {

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'code' => bin2hex(random_bytes(16)),
            'amount' => $this->basket->subtotal()
        ]);

        $order->menu()->attach($this->menus($location));

        return $order;
    }

    private function makePayment(Order $order)
    {
        return Peyment::create([
            'order_id' => $order->id,
            'method' => $this->request->methods ,
            'amount' => $this->basket->subtotal()
        ]);
    }

    private function menus(Location $location)
    {

        foreach ($this->basket->all() as $menu)
        {
            $menus[$menu->id] = ['location_id' => $location->id ];
        }
        return $menus;
    }

    private function walletUpdate(Order $order,int $remainWallet)
    {
        $user = User::find($order->user_id);
        $user->update(['wallet' => $remainWallet]);
    }

    public function remainWallet()
    {
        return Auth::user()->wallet - $this->basket->subtotal();
    }


}
