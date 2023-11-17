<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProperty extends Model
{
    use HasFactory;

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function properties()
    {
        return $this->hasMany(Property::class, 'property_uuid');
    }

    public function all_properties()
    {
        return $this->hasMany(Property::class, 'property_uuid');
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    public function scopeEndUser($query){
        return $query->whereIn('role_id', [1,2,3,4,5,6,9,13,15,16,17,18]);
    }

    public function scopeGetAll($query, $propertyUuid, $isApproved, $groupBy){
       $results = $query->when($propertyUuid, function($query, $propertyUuid){
                $query->where('property_uuid', $propertyUuid);
            })
            ->when($isApproved, function($query, $isApproved){
                $query->where('is_approved', $isApproved);
            })
            ->when($groupBy, function($query, $groupBy){
                $query->groupBy($groupBy);
            })->get();

        return $results;
    }




}
