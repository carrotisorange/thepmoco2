<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DeedOfSale extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;

    public $primaryKey = 'uuid';

    protected $attributes = [
        'status' => 'active',
        'classification' => 'regular'
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_uuid')->withDefault();
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_uuid')->withDefault();
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
