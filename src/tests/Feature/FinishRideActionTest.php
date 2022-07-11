<?php

use Src\Rides\Domain\Ride;
use function Pest\Faker\faker;

it('finishes a ride as expected', function() {
    $ride = Ride::factory()->create([
        'created_at' => now()->subMinutes(5)
    ]);

    $this->assertNull($ride->finished_at);
    $this->assertNull($ride->cost);

    $response = $this->post(route('ride.finish', $ride->uuid));

    $ride->refresh();

    $this->assertNotNull($ride->finished_at);
    $this->assertNotNull($ride->cost);

    $response->assertJson($ride->toArray(), false);
});

it('throws a 404 exception if ride doesn\'t exists', function () {
    $this->post(route('ride.finish', 'no-existent-uuid'))
        ->assertNotFound();
});
