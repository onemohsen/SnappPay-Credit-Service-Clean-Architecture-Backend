<?php

namespace App\Http\Controllers\Api\V1\CreditPackages;

use App\Http\Controllers\Controller;
use App\Http\Resources\CreditPackageResource;
use Domain\Crediting\Models\CreditPackage;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $creditPackages = CreditPackage::all();


        return CreditPackageResource::collection($creditPackages);
    }
}
