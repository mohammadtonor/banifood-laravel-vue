<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['title' , 'parent_id'];

    public function location()
    {
        return $this->hasMany(User::class);
    }
}
