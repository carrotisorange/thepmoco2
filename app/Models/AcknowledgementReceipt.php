<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcknowledgementReceipt extends Model
{
    use HasFactory, SoftDeletes;

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_uuid');
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_uuid');
    }

    public function guest(){
        return $this->belongsTo(Guest::class, 'guest_uuid');
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_uuid');
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