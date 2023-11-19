<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $primaryKey = 'uuid';

    protected $attributes = [
        'status' => 'reserved',
    ];

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_uuid')->withDefault();
    }

    public function guest(){
        return $this->belongsTo(Guest::class, 'guest_uuid')->withDefault();
    }

    public function property(){
        return $this->belongsTo(Property::class, 'property_uuid')->withDefault();
    }

    public function agent(){
        return $this->belongsTo(Agent::class, 'agent_id')->withDefault();
    }
}
