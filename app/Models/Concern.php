<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concern extends Model
{
    use HasFactory;

    protected $attributes = [
        'status' => 'pending',
    ];

    public function property()
    {
    return $this->belongsTo(Property::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function category()
    {
        return $this->belongsTo(ConcernCategory::class);
    }

    public static function search($property_uuid)
    {
        return empty($property_uuid)? static::query()
        : static::where('property_uuid', $property_uuid);
    }


}
