<?php

namespace Src\Rides\Domain\ValueObject;

class VehicleData
{
    /**
     * @var string
     */
    private $id;

    private function __construct(string $vehicle_id)
    {
        $this->id = $vehicle_id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public static function from(string $vehicle_id): VehicleData
    {
        return new self($vehicle_id);
    }
}
