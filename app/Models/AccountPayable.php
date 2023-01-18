<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountPayable extends Model
{
    use HasFactory;

    protected $attributes = [
        'is_approved'=> false,
        'status' => 'pending'
    ];

    protected $casts = [
        'particular' => 'array'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_uuid');
    }

    public function particular()
    {
        return $this->belongsTo(Particular::class, 'particular_id');
    }

    public function requester()
    {
        return $this->belongsTo(User::class, 'requester_id');
    }

    public function biller()
    {
        return $this->belongsTo(PropertyBiller::class, 'biller_id');
    }
}
