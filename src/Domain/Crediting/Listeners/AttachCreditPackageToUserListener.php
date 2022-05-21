<?php

declare(strict_types=1);

namespace Domain\Crediting\Listeners;

use Domain\Shared\Actions\Users\AttachCreditPackageToUser;
use Domain\Shared\Factories\CreditPackageUserPivotFactory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AttachCreditPackageToUserListener
{
    public function __construct()
    {
        //
    }

    public function handle(object $event): void
    {
        $pivotObject = CreditPackageUserPivotFactory::create($event->attributes);
        AttachCreditPackageToUser::handle($event->user, $pivotObject, $event->creditPackageId);
    }
}
