<?php

namespace App\Services\Auth\Traits;

use App\TwoFactor;

trait HasTwoFactor
{

    public function code()
    {
        return $this->hasOne(TwoFactor::class);
    }

    public function hasTwoFactor()
    {
        return $this->has_two_factor;
    }
}
