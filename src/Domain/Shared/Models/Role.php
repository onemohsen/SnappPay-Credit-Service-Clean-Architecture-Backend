<?php

declare(strict_types=1);

namespace Domain\Shared\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role as SpatieRole;


class Role extends SpatieRole
{
    use HasFactory, SoftDeletes;


    /** @return SomeFancyFactory */
    protected static function newFactory()
    {
        return \Database\Factories\RoleFactory::new();
    }
}
