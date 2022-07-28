<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_uuid');
    }

    public function activity_type()
    {
        return $this->belongsTo(ActivityType::class, 'activity_type_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
