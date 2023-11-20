<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $incrementing = false;

    public $primaryKey = 'uuid';

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    protected $attributes = [
        'photo_id' => 'avatars/avatar.png',
    ];

   public function references()
   {
        return $this->hasMany(Reference::class);
   }

    public function guardians()
    {
        return $this->hasMany(Guardian::class);
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'barangay_id')->withDefault();
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id')->withDefault();
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id')->withDefault();
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id')->withDefault();
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_uuid')->withDefault();
    }

    public function paymentrequests()
    {
     return $this->hasMany(PaymentRequest::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function collections()
    {
        return $this->hasMany(Collection::class);
    }

    public function acknowledgementreceipts()
        {
        return $this->hasMany(AcknowledgementReceipt::class);
    }

    public function concerns()
    {
        return $this->hasMany(Concern::class);
    }

    public function relationship()
    {
        return $this->belongsTo(Relationship::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function wallets()
    {
        return $this->hasMany(Wallet::class);
    }

      public static function search($search)
      {
        return empty($search)? static::query():static::
        where('tenant','like', '%'.$search.'%');
        // ->orWhere('mobile_number','like', '%'.$search.'%')
        // ->orWhere('email','like', '%'.$search.'%')
        // ->orWhere('bill_reference_no','like', '%'.$search.'%');
      }

     public function scopeGetAll($query, $propertyUuid, $status, $groupBy){
       $results = $query->when($propertyUuid, function($query, $propertyUuid){
                $query->where('property_uuid', $propertyUuid);
            })
            ->when($status, function($query, $status){
                $query->where('status', $status);
            })
            ->when($groupBy, function($query, $groupBy){
                $query->groupBy($groupBy);
            })->get();

        return $results;
    }
}
