<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function user_property()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function property(){
        return $this->belongsTo(Property::class, 'property_id');
    }

}
