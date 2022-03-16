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

    public function representative()
    {
        return $this->hasOne(Representative::class, 'representative_id');
    }

    public function bank()
    {
        return $this->hasOne(Bank::class, 'bank_id');
    }
}
