<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id' , 'code' , 'amount'
    ];

    public function menu(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Menu::class)->withPivot('location_id');
    }

    public function payment()
    {
        return $this->hasOne(Peyment::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
