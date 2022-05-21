<?php

declare(strict_types=1);

namespace Domain\Crediting\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreditPackage extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected  $fillable = [
        'name',
        'price',
        'payment_deadline_by_days',
    ];

    public function transactions(): MorphMany
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot([
            'payment_deadline_at',
            'is_paid',
            'paid_at',
        ]);
    }

    /** @return SomeFancyFactory */
    protected static function newFactory()
    {
        return \Database\Factories\CreditPackageFactory::new();
    }
}
