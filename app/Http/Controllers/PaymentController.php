<?php

namespace App\Http\Controllers;

use App\Order;
use App\support\Peyment\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    private $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }


    public function Verify(Request $request)
    {
        $order = Order::where('code', $request->ResNum)->firstOrFail();
        $user = User::find($order->user_id);
        Auth::login($user);

        return $this->transaction->verify()
            ? $this->sendSuccessResponce()
            : $this->sendFailedResponse();
    }

    private function sendSuccessResponce()
    {

        return redirect()->route('basket')->with('success' , 'سفارش شما با موقیت ایجاد شد');
    }

    private function sendFailedResponse()
    {

        return redirect()->route('basket')->with('error' , 'در هنگام ثبت سفارش خطایی رخ داده است!!');
    }

    public function redirect(Request $request)
    {
        return view('orderShow');
    }

}
