<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;

class Subscription extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $with = ['user'];

    protected $touches = ['user'];

    public static function booted()
    {
        static::creating(function ($subscription) {
            $subscription->reference ??= uniqid('mg');
            $subscription->amount    ??= 1000;
        });
    }

    /**
     * Mark the subscription as paid.
     */
    public function markAsPaid(): static
    {
        $this->update(['paid_at' => now()]);

        return $this;
    }

    public function scopePending(Builder $builder)
    {
        $builder->whereNull('paid_at');
    }

    public function scopeSuccessful(Builder $builder)
    {
        $builder->whereNotNull('paid_at');
    }

    public function scopeThisMonth(Builder $builder)
    {
        $builder->whereMonth('date', now()->month)
                ->whereYear('date', now()->year);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
