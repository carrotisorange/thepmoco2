<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;
    
    public function property()
    {
    return $this->belongsTo(Property::class, 'property_uuid');
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_uuid');
    }


}
