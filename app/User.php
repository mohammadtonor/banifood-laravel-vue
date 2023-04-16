<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Services\Auth\Traits\HasTwoFactor;

class User extends Authenticatable
{
    use Notifiable , HasTwoFactor;

    protected $fillable = [
        'name','family','email','wallet','isadmin','type','location_id','password', 'phone_number'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function walletUpdats(int $wallet)
    {
        $this->wallet = $wallet;
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
