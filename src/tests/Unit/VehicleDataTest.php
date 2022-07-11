<?php

use Src\Rides\Domain\ValueObject\UserData;
use function Pest\Faker\faker;

it('vehicle data returns vehicle id', function () {
    $vehicleId = faker()->uuid;
    $vehicleIdData = UserData::from($vehicleId);

    $this->assertEquals($vehicleIdData->getId(), $vehicleId);
});
