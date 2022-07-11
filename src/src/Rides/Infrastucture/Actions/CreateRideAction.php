<?php

namespace Src\Rides\Infrastucture\Actions;

use App\Http\Controllers\Controller;
use Src\Rides\Application\RidesRepository;
use Src\Rides\Domain\Requests\CreateRideRequest;
use Src\Rides\Domain\ValueObject\UserData;
use Src\Rides\Domain\ValueObject\VehicleData;
use Symfony\Component\HttpFoundation\Response;

class CreateRideAction extends Controller
{
    /**
     * @var \Illuminate\Contracts\Foundation\Application|mixed
     */
    private $rideRepository;

    public function __construct(RidesRepository $rideRepository)
    {
        $this->rideRepository = $rideRepository;
    }

    public function __invoke(CreateRideRequest $request)
    {
        $ride = $this->rideRepository->create(
            UserData::from($request->user_id),
            VehicleData::from($request->vehicle_id),
        );

        return response()->json($ride->uuid, Response::HTTP_CREATED);
    }
}
