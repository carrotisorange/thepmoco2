<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// class User extends Authenticatable implements MustVerifyEmail
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public function getRouteKeyName()
    {
        return 'username';
    }

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

    protected $attributes = [
        //'avatar' => 'avatars/avatar.png',
        'status' => 'active',
    ];

    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function property()
    {
        return $this->hasMany(UserProperty::class, 'property_uuid');
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function refferer()
    {
        return $this->belongsTo(Referrer::class, 'referrer_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function points()
    {
        return $this->hasMany(Point::class, 'user_id');
    }

      public function timestamps()
      {
      return $this->hasMany(Timestamp::class, 'user_id');
      }


    public function user_properties()
    {
        return $this->hasMany(UserProperty::class, 'user_id');
    }

    public function avatarUrl()
    {
        return 'https://www.gravatar.com/avatar/'.md5(strtolower(trim($this->email)));
    }
}
