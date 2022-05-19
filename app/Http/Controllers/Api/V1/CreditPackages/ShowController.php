<?php

namespace App\Http\Controllers\Api\V1\CreditPackages;

use App\Http\Controllers\Controller;
use App\Http\Resources\CreditPackageResource;
use Domain\Crediting\Models\CreditPackage;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Domain\Crediting\Models\CreditPackage  $creditPackage
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, CreditPackage $creditPackage)
    {
        return CreditPackageResource::make($creditPackage);
    }
}
