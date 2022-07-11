<?php

namespace Src\Rides\Infrastucture\Actions;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\Rides\Application\RidesRepository;
use Src\Rides\Domain\Ride;

class FinishRideAction extends Controller
{
    /**
     * @var RidesRepository
     */
    private RidesRepository $ridesRepoxsitory;

    public function __construct(RidesRepository $ridesRepository)
    {
        $this->ridesRepository = $ridesRepository;
    }

    public function __invoke(Ride $ride): JsonResponse
    {
        return response()->json(
            $this->ridesRepository->finish($ride)
        );
    }
}
