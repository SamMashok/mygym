<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Subscription extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function booted()
    {
        static::creating(function ($subscription) {
            $subscription->reference ??= Str::random(15);
        });
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
