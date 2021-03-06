<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API V1 Routes
|--------------------------------------------------------------------------
*/

Route::post('/login', App\Http\Controllers\Api\V1\Users\LoginController::class)->name('login'); // route('api.v1.login')


Route::middleware('auth:api')->group(function () {

    Route::post('/logout', App\Http\Controllers\Api\V1\Users\LogoutController::class)->name('logout'); // route('api.v1.logout')

    /*
    | Users Endpoints
    */
    Route::prefix('users')->as('users.')->group(function () {
        Route::get('/current', App\Http\Controllers\Api\V1\Users\CurrentController::class)->name('current'); // route('api.v1.users.current')
        Route::get('/', App\Http\Controllers\Api\V1\Users\IndexController::class)->name('index')->middleware('can:show user'); // route('api.v1.users.index')
        Route::get('{user:id}', App\Http\Controllers\Api\V1\Users\ShowController::class)->name('show')->middleware('can:show user'); // route('api.v1.users.index')
        Route::post('/', App\Http\Controllers\Api\V1\Users\StoreController::class)->name('store')->middleware('can:create user'); // route('api.v1.users.store')
        Route::patch('{user:id}', App\Http\Controllers\Api\V1\Users\UpdateController::class)->name('update')->middleware('can:edit user'); // route('api.v1.users.update')
        Route::delete('{user:id}', App\Http\Controllers\Api\V1\Users\DeleteController::class)->name('delete')->middleware('can:delete user'); // route('api.v1.users.delete')
    });

    /*
    | CreditPackages Endpoints
    */
    Route::prefix('credit-packages')->as('credit-packages.')->group(function () {
        Route::get('/', App\Http\Controllers\Api\V1\CreditPackages\IndexController::class)->name('index')->middleware('can:show credit-package'); // route('api.v1.credit-packages.index')
        Route::get('{creditPackage:id}', App\Http\Controllers\Api\V1\CreditPackages\ShowController::class)->name('show')->middleware('can:show credit-package'); // route('api.v1.credit-packages.show')
        Route::post('/', App\Http\Controllers\Api\V1\CreditPackages\StoreController::class)->name('store')->middleware('can:create credit-package'); // route('api.v1.credit-packages.store')
        Route::patch('{creditPackage:id}', App\Http\Controllers\Api\V1\CreditPackages\UpdateController::class)->name('update')->middleware('can:edit credit-package'); // route('api.v1.credit-packages.update')
        Route::delete('{creditPackage:id}', App\Http\Controllers\Api\V1\CreditPackages\DeleteController::class)->name('delete')->middleware('can:delete credit-package'); // route('api.v1.credit-packages.delete')
    });

    /*
    | Products Endpoints
    */
    Route::prefix('products')->as('products.')->group(function () {
        Route::get('/', App\Http\Controllers\Api\V1\Products\IndexController::class)->name('index')->middleware('can:show product'); // route('api.v1.products.index')
        Route::get('{product:id}', App\Http\Controllers\Api\V1\Products\ShowController::class)->name('show')->middleware('can:show product'); // route('api.v1.products.show')
        Route::post('/', App\Http\Controllers\Api\V1\Products\StoreController::class)->name('store')->middleware('can:create product'); // route('api.v1.products.store')
        Route::patch('{product:id}', App\Http\Controllers\Api\V1\Products\UpdateController::class)->name('update')->middleware('can:edit product'); // route('api.v1.products.update')
        Route::delete('{product:id}', App\Http\Controllers\Api\V1\Products\DeleteController::class)->name('delete')->middleware('can:delete product'); // route('api.v1.products.delete')
    });

    /*
    | Transactions Endpoints
    */
    Route::prefix('transactions')->as('transactions.')->group(function () {
        Route::get('/', App\Http\Controllers\Api\V1\Transactions\IndexController::class)->name('index')->middleware('can:show transaction'); // route('api.v1.transactions.index')
        Route::get('{transaction:id}', App\Http\Controllers\Api\V1\Transactions\ShowController::class)->name('show')->middleware('can:show transaction'); // route('api.v1.transactions.show')
        Route::post('users/{user}/products/{product}', App\Http\Controllers\Api\V1\Transactions\BuyProductController::class)->name('buy-product')->middleware('can:create transaction'); // route('api.v1.transactions.buy-product')
        Route::post('users/{user}/credit-packages/{creditPackage}', App\Http\Controllers\Api\V1\Transactions\CreditPackageActivationController::class)->name('credit-package-activation')->middleware('can:create transaction'); // route('api.v1.transactions.credit-package-activation')
    });
});
