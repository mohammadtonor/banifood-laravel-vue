<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peyment extends Model
{
    protected $fillable = [
        'order_id' , 'method' , 'amount' , 'status' , 'ref_num' , 'gateway'
    ];

    protected $attributes = [
        'status' => 0
    ];

    public function isOnline()
    {
        return $this->method === 'online';
    }

    public function confirm(string $refnum , string $gateway = null,int $wallet)
    {

        $this->ref_num = $refnum;
        $this->gateway = $gateway;
        $this->status = 1;
        $this->wallet = $wallet;
        $this->save();
    }
}
