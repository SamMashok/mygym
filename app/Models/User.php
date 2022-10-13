<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
//     */
//    protected $fillable = [
//        'name',
//        'email',
//        'password',
//    ];
//
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function password(): Attribute
    {
        return Attribute::set(fn ($value) => bcrypt($value));

    }

    public function isAdmin()
    {
        return $this->is_admin !== 0;
    }

    public function isSuperAdmin()
    {
        return $this->is_admin == 2;
    }

    public function photo()
    {
        if ($this->photo == null && $this->gender == "M" ) {

            return asset("uploads/defaultmale.png");
        } elseif ($this->photo == null && $this->gender == "F") {

            return asset("uploads/defaultfemale.png");
        } else {

            return asset("uploads/{$this->photo}?".mt_rand());
        }

    }

}
