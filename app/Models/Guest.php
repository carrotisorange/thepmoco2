<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guest extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;

    protected $primaryKey = 'uuid';
    
    protected $attributes = [
        'status' => 'pending'
    ];

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_uuid');
    }

    public function property(){
        return $this->belongsTo(Property::class, 'property_uuid');
    }

    public function bills(){
        return $this->hasMany(Bill::class);
    }

    public function collections(){
        return $this->hasMany(Collection::class);
    }

    public static function search($search)
    {
        return empty($search)? static::query()
      : static::where('guest','like', '%'.$search.'%');
    }

    public function additional_guests(){
        return $this->hasMany(AdditionalGuest::class);
    }
}
