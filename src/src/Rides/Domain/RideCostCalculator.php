<?php

namespace Src\Rides\Domain;

use Illuminate\Support\Carbon;

class RideCostCalculator
{
    const UNLOCK_PRICE = 100;
    const MINUTE_PRICE = 18;

    public function calculate(Ride $ride)
    {
        $startTime = Carbon::parse($ride->created_at);
        $minutes = now()->diffInMinutes($startTime);

        return self::UNLOCK_PRICE + ($minutes * self::MINUTE_PRICE);
    }
}
