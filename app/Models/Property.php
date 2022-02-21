<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    public $primaryKey = 'uuid';

    protected $attributes = [
         'thumbnail' => 'thumbnails/thumbnail.png',
         'status' => 'active'
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public $incrementing = false;

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function rooms()
    {
        return $this->hasMany(Property::class);
    }

    public function users()
    {
        return $this->hasMany(UserProperty::class, 'user_id');
    }

}
