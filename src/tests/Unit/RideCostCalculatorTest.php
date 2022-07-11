<?php

use Src\Rides\Domain\Ride;
use Src\Rides\Domain\RideCostCalculator;
use Tests\TestCase;

uses(TestCase::class);

it('calculates ride cost as expected', function () {
    $ride = Ride::factory()->make(['created_at' => now()->subMinutes(10)]);

    $calculator = new RideCostCalculator();
    $cost = $calculator->calculate($ride);

    $this->assertEquals(
        $cost,
        RideCostCalculator::UNLOCK_PRICE + (10 * RideCostCalculator::MINUTE_PRICE)
    );
});
