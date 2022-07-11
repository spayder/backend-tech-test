<?php

use Src\Rides\Domain\ValueObject\UserData;
use function Pest\Faker\faker;

it('user data returns user id', function () {
    $userId = faker()->uuid;
    $userData = UserData::from($userId);

    $this->assertEquals($userData->getId(), $userId);
});
