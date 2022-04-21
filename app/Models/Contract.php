<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Referral;

class Contract extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $primaryKey = 'uuid';

    protected $attributes = [
        'status' => 'active',
        'moveout_reason' => 'NA'
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_uuid');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_uuid');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function property()
    {
    return $this->belongsTo(Property::class, 'property_uuid');
    }

     public function referral()
     {
     return $this->belongsTo(Referral::class, 'contract_uuid');
     }

}
