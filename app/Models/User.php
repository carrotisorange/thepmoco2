<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
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
    
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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
        'avatar' => 'avatars/avatar.png',
        'status' => 'active'
    ];

    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function properties()
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
}
