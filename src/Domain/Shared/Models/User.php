<?php

declare(strict_types=1);

namespace Domain\Shared\Models;

use Domain\Crediting\Models\CreditPackage;
use Domain\Crediting\Models\Product;
use Domain\Crediting\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are use default guard spatie package.
     *
     * @var string
     */
    protected $guard_name = 'api';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected  $fillable = [
        'name',
        'email',
        'password',
        'wallet_balance',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected  $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected  $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function products(): HasManyThrough
    {
        return $this->hasManyThrough(Product::class, Transaction::class);
    }

    public function creditPackages(): BelongsToMany
    {
        return $this->belongsToMany(CreditPackage::class)->withPivot([
            'payment_deadline_at',
            'is_paid',
            'paid_at',
        ]);
    }

    public static function hasUnPaidCreditPackages(int|string $userId)
    {
        return User::query()
            ->where('id', $userId)
            ->whereHas('creditPackages', fn ($q) => $q->where('is_paid', false))
            ->count();
    }

    /** @return SomeFancyFactory */
    protected static function newFactory()
    {
        return \Database\Factories\UserFactory::new();
    }
}
