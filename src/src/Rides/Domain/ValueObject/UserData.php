<?php

namespace Src\Rides\Domain\ValueObject;

class UserData
{
    /**
     * @var string
     */
    private $id;

    private function __construct(string $user_id)
    {
        $this->id = $user_id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public static function from(string $user_id): UserData
    {
        return new self($user_id);
    }
}
