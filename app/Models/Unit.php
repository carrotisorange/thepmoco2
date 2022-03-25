<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Unit extends Model
{
    use HasFactory;

    public $incrementing = false;

    public $primaryKey = 'uuid';
    
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    protected $attributes = [
        'rent'=>0.00,
        'dimensions' => '0x0',
        'discount' => 0.00,
        'building_id' => null,
        'status_id' => 6,
        'category_id' => 1,
        'thumbnail' => 'thumbnails/thumbnail.png',
        'occupancy' => 1,
        'is_enrolled' => 0
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
        return $this->belongsTo(Property::class, 'property_uuid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function enrollees()
    {
        return $this->hasMany(Enrollee::class);
    }

    // public function scopeSearch($term, $query)
    // {
    //     $term = "%$term%";
    //     $query->where('unit', 'like', $term)
    //     ->orWhere('building', 'like', $term);
    // }
}