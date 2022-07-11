<?php

namespace Src\Rides\Actions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateRideAction extends Controller
{
    public function __invoke(Request $request)
    {
        dd($request->user_id);
    }
}
