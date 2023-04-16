<?php

namespace App\support\Peyment\Gateway;

use App\Order;
use Illuminate\Http\Request;

interface GatewayInterface
{

    const TRANSACTION_FAILED = 'transaction.failed';
    const TRANSACTION_SUCCESS = 'transaction.success';

    public function pay(Order $order, int $amountOrder);
    public function verify(Request $request);
    public function getName(): string;
}
