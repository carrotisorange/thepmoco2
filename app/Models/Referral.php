<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;

class Referral extends Model
{
    use HasFactory;

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_uuid');
    }

    public function contract()
    {
    return $this->belongsTo(Contract::class);
    }
}
