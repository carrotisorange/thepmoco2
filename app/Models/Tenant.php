<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
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
        return $this->belongsTo(Barangay::class, 'barangay_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_uuid');
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function collections()
    {
        return $this->hasMany(Collection::class);
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
      return empty($search)? static::query()
      : static::where('tenant','like', '%'.$search.'%')
      ->orWhere('mobile_number','like', '%'.$search.'%')
      ->orWhere('email','like', '%'.$search.'%')
      ->orWhere('bill_reference_no','like', '%'.$search.'%');
      }
}
