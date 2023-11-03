<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use HasFactory, SoftDeletes;

    protected $attributes = [
        'status' => 'unpaid',
        'due_date' => null,
        'bill' => 0
    ];


    public function property()
    {
        return $this->belongsTo(Property::class, 'property_uuid');
    }

    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_uuid');
    }

     public function collection(){
        return $this->belongsTo(Collection::class, 'bill_id');
     }



    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_uuid');
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_uuid');
    }

    public function houseOwner(){
        return $this->belongsTo(HouseOwner::class,'house_owner_id');
    }

    public function guest(){
        return $this->belongsTo(Guest::class, 'guest_uuid');
    }


    public function particular()
    {
        return $this->belongsTo(Particular::class, 'particular_id');
    }

    public function scopePosted($query)
    {
        return $query->where('is_posted', true);
    }

    public function scopePostedTenantBill($query, $tenantUuid){
        return $query->where('tenant_uuid', $tenantUuid)->posted()->sum('bill');
    }

    public static function search($search)
    {
         return empty($search)? static::query()
         : static::where('reference_no','like', '%'.$search.'%');
    }
 }
