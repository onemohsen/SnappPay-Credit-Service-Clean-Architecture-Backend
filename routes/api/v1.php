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


/*
| Users Endpoints
*/
Route::prefix('users')->as('users.')->group(function () {
    Route::get('/', App\Http\Controllers\Api\V1\Users\IndexController::class)->name('index'); // route('api.v1.users.index')
    Route::get('{user:id}', App\Http\Controllers\Api\V1\Users\ShowController::class)->name('show'); // route('api.v1.users.index')
    Route::post('/', App\Http\Controllers\Api\V1\Users\StoreController::class)->name('store'); // route('api.v1.users.store')
    Route::patch('{user:id}', App\Http\Controllers\Api\V1\Users\UpdateController::class)->name('update'); // route('api.v1.users.update')
    Route::delete('{user:id}', App\Http\Controllers\Api\V1\Users\DeleteController::class)->name('delete'); // route('api.v1.users.delete')
});

/*
| CreditPackages Endpoints
*/
Route::prefix('credit-packages')->as('credit-packages.')->group(function () {
    Route::get('/', App\Http\Controllers\Api\V1\CreditPackages\IndexController::class)->name('index'); // route('api.v1.credit-packages.index')
    Route::get('{creditPackage:id}', App\Http\Controllers\Api\V1\CreditPackages\ShowController::class)->name('show'); // route('api.v1.credit-packages.show')
});

/*
| Products Endpoints
*/
Route::prefix('products')->as('products.')->group(function () {
    Route::get('/', App\Http\Controllers\Api\V1\Products\IndexController::class)->name('index'); // route('api.v1.products.index')
    Route::get('{product:id}', App\Http\Controllers\Api\V1\Products\ShowController::class)->name('show'); // route('api.v1.products.show')
});

/*
| Transactions Endpoints
*/
Route::prefix('transactions')->as('transactions.')->group(function () {
    Route::get('/', App\Http\Controllers\Api\V1\Transactions\IndexController::class)->name('index'); // route('api.v1.transactions.index')
    Route::get('{transaction:id}', App\Http\Controllers\Api\V1\Transactions\ShowController::class)->name('show'); // route('api.v1.transactions.show')
});
