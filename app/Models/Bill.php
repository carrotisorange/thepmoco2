<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $attributes = [
        'status' => 'unpaid',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_uuid');
    }

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_uuid');
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_uuid');
    }    

    public function particular()
    {
        return $this->belongsTo(Particular::class, 'particular_id');
    }
 }
