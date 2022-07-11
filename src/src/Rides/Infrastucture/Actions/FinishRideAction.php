<?php

namespace Src\Rides\Actions;

use App\Http\Controllers\Controller;

class FinishRideAction extends Controller
{
    public function __invoke()
    {
        dd('finish ride action');
    }
}
