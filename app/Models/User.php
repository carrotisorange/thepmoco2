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
        'status' => 'interested',

        'is_portfolio_create_allowed' => 1,
        'is_portfolio_read_allowed' => 1,
        'is_portfolio_update_allowed' => 1,
        'is_portfolio_delete_allowed' => 1,

        'is_contract_create_allowed' => 1,
        'is_contract_read_allowed' => 1,
        'is_contract_update_allowed' => 1,
        'is_contract_delete_allowed' => 1,

        'is_concern_create_allowed' => 1,
        'is_concern_read_allowed' => 1,
        'is_concern_update_allowed' => 1,
        'is_concern_delete_allowed' => 1,

        'is_tenant_portal_create_allowed' => 1,
        'is_tenant_portal_read_allowed' => 1,
        'is_tenant_portal_update_allowed' => 1,
        'is_tenant_portal_delete_allowed' => 1,

        'is_owner_portal_create_allowed' => 1,
        'is_owner_portal_read_allowed' => 1,
        'is_owner_portal_update_allowed' => 1,
        'is_owner_portal_delete_allowed' => 1,

        'is_account_payable_create_allowed' => 1,
        'is_account_payable_read_allowed' => 1,
        'is_account_payable_update_allowed' => 1,
        'is_account_payable_delete_allowed' => 1,

        'is_account_receivable_create_allowed' => 1,
        'is_account_receivable_read_allowed' => 1,
        'is_account_receivable_update_allowed' => 1,
        'is_account_receivable_delete_allowed' => 1,

        'plan_id' => null,

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
        return $this->belongsTo(Plan::class, 'plan_id');
    }

    public function discountcode()
    {
        return $this->belongsTo(DiscountCode::class, 'discount_code');
    }

    public function checkoutoption()
    {
        return $this->belongsTo(CheckoutOption::class, 'checkoutoption_id');
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
