<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRestriction extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function feature(){
        return $this->belongsTo(Feature::class, 'feature_id');
    }

    public function restriction(){
        return $this->belongsTo(Restriction::class, 'restriction_id');
    }

    public function property(){
        return $this->belongsTo(Property::class, 'property_uuid');
    }
}
