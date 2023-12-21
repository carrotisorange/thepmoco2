<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Concern extends Model
{
    use HasFactory, SoftDeletes;

    protected $attributes = [
        'status' => 'pending',
    ];

    public function property()
    {
    return $this->belongsTo(Property::class)->withDefault();
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class)->withDefault();
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class)->withDefault();
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class)->withDefault();
    }

    public function category()
    {
        return $this->belongsTo(ConcernCategory::class)->withDefault();
    }

    public function subcategory()
    {
        return $this->belongsTo(ConcernSubcategory::class, 'subcategory_id')->withDefault();
    }

    public static function search($search)
    {
        return empty($search)? static::query()
        : static::where('reference_no','like', '%'.$search.'%');
    }

    public function scopeGetAll($query, $propertyUuid, $status, $groupBy){
       $results = $query->when($propertyUuid, function($query, $propertyUuid){
                $query->where('property_uuid', $propertyUuid);
            })
            ->when($status, function($query, $status){
                $query->where('status', $status);
            })
            ->when($groupBy, function($query, $groupBy){
                $query->groupBy($groupBy);
            })->get();

        return $results;
    }


}
