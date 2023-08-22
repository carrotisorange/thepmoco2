<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

     public $incrementing = false;

     protected $primaryKey = 'uuid';

    protected $attributes = [
        'photo_id' => 'avatars/avatar.png',
        'country_id' => 247,
        'province_id' => 4121,
        'city_id' => 48315,
    ];

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

     public function representatives()
     {
     return $this->hasMany(Representative::class);
     }

    public function banks()
    {
        return $this->hasMany(Bank::class, 'owner_uuid');
    }

    public function property(){
        return $this->belongsTo(Property::class);
    }

    public function enrollees()
    {
        return $this->hasMany(Enrollee::class);
    }

    public function deed_of_sales()
    {
        return $this->hasMany(DeedOfSale::class);
    }

    public function spouses()
    {
        return $this->hasMany(Spouse::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function collections()
    {
        return $this->hasMany(Collection::class);
    }

    public function remittances()
    {
        return $this->hasMany(Remittance::class);
    }

    public static function search($search)
    {
        return empty($search)? static::query()
      : static::where('owner','like', '%'.$search.'%')
    //   ->orWhere('mobile_number','like', '%'.$search.'%')
    //   ->orWhere('email','like', '%'.$search.'%')
      ;
    }
}
