<?php

declare(strict_types=1);

namespace Domain\Crediting\Models;

use App\Domain\Crediting\Models\Builders\TransactionBuilder;
use Domain\Shared\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected  $fillable = [
        'old_user_wallet_balance',
        'price',
        'new_user_wallet_balance',
        'is_increment',
        'user_id',
    ];

    protected  $casts = ['is_increment' => 'boolean'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function transactionable(): MorphTo
    {
        return $this->morphTo();
    }

    public function newElequentBuilder($query): TransactionBuilder
    {
        return new TransactionBuilder($query);
    }
}
