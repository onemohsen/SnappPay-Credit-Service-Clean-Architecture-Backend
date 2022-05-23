<?php

declare(strict_types=1);

namespace Domain\Shared\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Permission as SpatiePermission;


class Permission extends SpatiePermission
{
    use HasFactory, SoftDeletes;


    /** @return SomeFancyFactory */
    protected static function newFactory()
    {
        return \Database\Factories\ProductFactory::new();
    }
}
