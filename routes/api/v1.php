<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API V1 Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('users')->as('users.')->group(function () {
    Route::get('/', App\Http\Controllers\Api\V1\Users\IndexController::class)->name('index'); // route('api.v1.users.index')
    Route::get('{user:id}', App\Http\Controllers\Api\V1\Users\ShowController::class)->name('show'); // route('api.v1.users.index')
});

