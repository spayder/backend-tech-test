<?php

namespace Src\Rides\Application;

use App\Contracts\EloquentRepositoryInterface;
use Illuminate\Support\Str;
use Src\Rides\Domain\Ride;
use Src\Rides\Domain\ValueObject\UserData;
use Src\Rides\Domain\ValueObject\VehicleData;

class RidesRepositoryInterface implements EloquentRepositoryInterface
{
    public function create(UserData $user, VehicleData $vehicle)
    {
        return Ride::create([
            'uuid' => Str::uuid(),
            'user_id' => $user->getId(),
            'vehicle_id' => $vehicle->getId(),
        ]);
    }
}
