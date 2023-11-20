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


}
