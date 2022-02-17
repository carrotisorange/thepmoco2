<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $attributes = [
        'photo_id' => 'avatars/avatar.png',
    ];

    public function reference()
    {
        return $this->hasOne(Reference::class, 'reference_id');
    }

    public function guardian()
    {
        return $this->hasOne(Guardian::class, 'guardian_id');
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
}
