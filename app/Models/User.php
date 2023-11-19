<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PDO;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    // public function getRouteKeyName()
    // {
    //     return 'username';
    // }

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
        'status' => 'pending',
        'plan_id' => 1,
        'is_portfolio_unlocked' => 1,
        'is_contract_unlocked' => 1,
        'is_concern_unlocked' => 1,
        'is_tenantportal_unlocked' => 1,
        'is_ownerportal_unlocked' => 1,
        'is_accountpayable_unlocked' => 1,
        'is_accountreceivable_unlocked' => 1,
        'checkoutoption_id' => 1
    ];

    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public function activities()
    {
        return $this->hasMany(Activity::class)->orderBy('id', 'desc');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class)->orderBy('id', 'desc');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id')->withDefault();
    }

    public function discountcode()
    {
        return $this->belongsTo(DiscountCode::class, 'discount_code')->withDefault();
    }

    public function checkoutoption()
    {
        return $this->belongsTo(CheckoutOption::class, 'checkoutoption_id')->withDefault();
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
        return $this->belongsTo(Referrer::class, 'referrer_id')->withDefault();
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id')->withDefault();
    }

    public function points()
    {
        return $this->hasMany(Point::class, 'user_id');
    }

    public function timestamps()
    {
      return $this->hasMany(Timestamp::class, 'user_id');
    }

    public function sessions(){
        return $this->hasMany(Session::class, 'user_id');
    }


    public function user_properties()
    {
        return $this->hasMany(UserProperty::class, 'user_id');
    }

    public function avatarUrl()
    {
        return 'https://www.gravatar.com/avatar/'.md5(strtolower(trim($this->email)));
    }

    public static function search($search)
    {
    return empty($search)? static::query()
        : static::where('name','like', '%'.$search.'%')
        ->orWhere('mobile_number','like', '%'.$search.'%')
        ->orWhere('email','like', '%'.$search.'%');
    }


}
