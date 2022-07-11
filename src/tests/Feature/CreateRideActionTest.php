<?php

use function Pest\Faker\faker;

it('creates a ride as expected', function() {
    $userId = faker()->uuid;
    $vehicleId = faker()->uuid;

    $postData = [
        'user_id' => $userId,
        'vehicle_id' => $vehicleId,
    ];

    $this->post(route('ride.create'), $postData)
        ->assertCreated();

    $this->assertDatabaseHas('rides', $postData);
});

it('throws an error if no user_id or vehicle_id is passed', function () {
    $this->post(route('ride.create'), [])
        ->assertSessionHasErrors(['vehicle_id', 'user_id']);
});
