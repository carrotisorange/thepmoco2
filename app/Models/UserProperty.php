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
    

}
