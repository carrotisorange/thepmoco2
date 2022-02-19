<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Room extends Model
{
    use HasFactory;

    public $incrementing = false;

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    protected $attributes = [
        'dimensions' => 0.00,
        'discount' => 0.00,
        'status_id' => 1,
        'thumbnail' => 'thumbnails/thumbnail.png',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class, 'floor_id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
