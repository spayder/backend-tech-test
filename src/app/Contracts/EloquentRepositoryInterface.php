<?php

namespace App\Contracts;

use Src\Rides\Domain\ValueObject\UserData;
use Src\Rides\Domain\ValueObject\VehicleData;

interface EloquentRepositoryInterface
{
    public function create(UserData $user, VehicleData $vehicle);
}
