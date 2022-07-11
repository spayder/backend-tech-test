<?php

use Illuminate\Support\Facades\Route;
use Src\Rides\Infrastucture\Actions\CreateRideAction;
use Src\Rides\Infrastucture\Actions\FinishRideAction;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('rides', CreateRideAction::class)->name('ride.create');
Route::post('rides/{ride:uuid}/finish', FinishRideAction::class)->name('ride.finish');
