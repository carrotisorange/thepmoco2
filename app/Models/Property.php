<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Property extends Model
{
    use HasFactory;

    public $primaryKey = 'uuid';

    protected $attributes = [
        'thumbnail' => 'thumbnails/thumbnail.png',
        'status' => 'active',
        'note_to_transient' => 'Cancellation Policy: Deposits are non-refundable but can be rebook with surcharge.'
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public $incrementing = false;

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function province()
    {
      return $this->belongsTo(Province::class, 'province_id');
    }

    public function city()
    {
      return $this->belongsTo(City::class, 'city_id');
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function billers(){
        return $this->hasMany(PropertyBiller::class);
    }



     public function points()
     {
     return $this->hasMany(Point::class);
     }

     public function elections()
     {
     return $this->hasMany(Election::class);
     }

    public function users()
    {
        return $this->hasMany(UserProperty::class, 'user_id');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function utilities(){
        return $this->hasMany(Utility::class);
    }

    public function accountpayables()
    {
        return $this->hasMany(AccountPayable::class);
    }


    public function collections()
    {
        return $this->hasMany(Collection::class);
    }

    public function houses(){
        return $this->hasMany(House::class);
    }

    public function acknowledgementreceipts()
    {
        return $this->hasMany(AcknowledgementReceipt::class);
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }

    public function owners()
    {
        return $this->hasMany(Owner::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function particulars()
    {
        return $this->hasMany(PropertyParticular::class);
    }

    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public function concerns()
    {
        return $this->hasMany(Concern::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function guests(){
        return $this->hasMany(Guest::class);
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }

    public function referrals()
        {
        return $this->hasMany(Referral::class);
        }

    public function timestamps()
    {
        return $this->hasMany(Timestamp::class);
    }

    public function scopeFilter($query)
    {
        return $query->where('unit', '%like%','10');
    }

    public function property_users()
    {
        return $this->hasMany(UserProperty::class, 'property_uuid')->orderBy('id', 'desc');
    }



}
