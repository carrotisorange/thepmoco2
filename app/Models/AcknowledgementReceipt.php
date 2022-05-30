<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcknowledgementReceipt extends Model
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

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_uuid');
    }

    public static function search($search)
        {
        return empty($search)? static::query()
        : static::where('ar_no','like', '%'.$search.'%');
    }

}